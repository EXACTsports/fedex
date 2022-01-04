<?php

namespace EXACTSports\FedEx\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Cache;
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Crypt\RSA;

class FedExService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('fedex.apiBaseUrl'),
        ]);
    }

    /**
     * OAuth.
     */
    public function token()
    {
        $response = $this->client->request('POST', '/auth/oauth/v2/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => config('fedex.clientId'),
                'client_secret' => config('fedex.clientSecret'),
                'scope' => 'oob',
            ],
        ]);

        $response = (string) $response->getBody();

        return json_decode($response);
    }

    /**
     * Gets token.
     */
    private function getToken() : string
    {
        if (Cache::has('fedex.accessToken')) {
            $expiresIn = Cache::get('fedex.expiresIn');
            $expiresIn = date('Y-m-d H:i:s', $expiresIn);
            $currentTime = date('Y-m-d H:i:s');

            if ($currentTime < $expiresIn) {
                return Cache::get('fedex.accessToken');
            }
        }

        $response = $this->token();
        $expiresIn = strtotime(date('Y-m-d H:i:s')) + $response->expires_in;
        $accessToken = $response->access_token;

        Cache::rememberForever('fedex.expiresIn', fn () => $expiresIn);
        Cache::rememberForever('fedex.accessToken', fn () => $accessToken);

        return $response->access_token;
    }

    /**
     * Uploads document from local drive.
     * @param string $file
     */
    public function uploadDocumentFromLocalDrive(array $documentFromLocalDrive) : object
    {
        try {
            $client = new Client([
                'base_uri' => config('fedex.documentUploadHostname'),
            ]);

            $response = $client->request('POST', '/document/fedexoffice/v1/documents', [
                'headers' => [
                    'Content-Type' => 'multipart/form-data',
                ],
                'multipart' => [$documentFromLocalDrive],
            ]);

            $response = (string) $response->getBody();
            $response = json_decode($response);

            return $response;
        } catch (ClientException $e) {
            return json_decode((string) $e->getResponse()->getBody());
        } 
    }

    /**
     * Uploads document from cloud drive.
     * @param string $link
     * @param string $fileName
     */
    public function uploadDocumentFromCloudDrive(string $link, string $fileName) : object
    {
        try {
            $client = new Client([
                'base_uri' => config('fedex.documentUploadHostname'),
            ]);

            $response = $client->request('POST', '/document/fedexoffice/v1/documents', [
                'headers' => $this->getRequestHeader(),
                'json' => [
                    'input' => [
                        'download' => [
                            'link' => $link,
                            'fileName' => $fileName,
                        ],
                    ],
                ],
            ]);

            $response = (string) $response->getBody();
            $response = json_decode($response);

            return $response;
        } catch (ClientException $e) {
            return json_decode((string) $e->getResponse()->getBody());
        } 
    }

    /**
     * Converts to PDF.
     * @param string $documentId
     */
    public function convertToPDF(string $documentId, array $options) : object
    {
        $response = $this->client->request('POST', '/document/fedexoffice/v1/documents/' . $documentId . '/printready', [
            'headers' => $this->getRequestHeader(),
            'json' => $options,
        ]);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Gets document preview.
     * @param string $documentId
     * @param int $pageNumber
     */
    public function getDocumentPreview(string $documentId, int $pageNumber = 1) : object
    {
        $client = new Client([
            'base_uri' => config('fedex.document-preview-hostname'),
        ]);

        $response = $client->request('GET', '/document/fedexoffice/v1/documents/' . $documentId . '/preview?pageNumber=' . $pageNumber);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Gets rate estimate.
     * @param array $rateRequest
     */
    public function getRate(array $rateRequest)
    {
        try {
            $response = $this->client->request('POST', '/rate/fedexoffice/v2/rates', [
                'headers' => $this->getRequestHeader(),
                'json' => $rateRequest,
            ]);

            $response = (string) $response->getBody();
            $response = json_decode($response);

            return $response;
        } catch (ClientException $e) {
            return json_decode((string) $e->getResponse()->getBody());
        }
    }

    /**
     * Gets delivery options pickup requiest.
     */
    public function getDeliveryOptions(array $deliveryOptions)
    {
        $response = $this->client->request('POST', '/order/fedexoffice/v2/deliveryoptions', [
            'headers' => $this->getRequestHeader(),
            'json' => $deliveryOptions,
        ]);

        $response = (string) $response->getBody();

        $response = json_decode($response);

        return $response;
    }

    /**
     * Allows the API user to submit the print order and remit payment for it.
     * @param array $orderSubmissionRequest
     */
    public function orderSubmissions(array $orderSubmissionRequest)
    {
        try {
            $response = $this->client->request('POST', '/order/fedexoffice/v2/ordersubmissions', [
                'headers' => $this->getRequestHeader(),
                'json' => $orderSubmissionRequest,
            ]);

            $response = (string) $response->getBody();
            $response = json_decode($response);

            return $response;
        } catch (ClientException $e) {
            return json_decode((string) $e->getResponse()->getBody());
        }
    }

    /**
     * Gets request header.
     */
    private function getRequestHeader()
    {
        $token = $this->getToken();

        return [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
        ];
    }

    /**
     * Gets encription key.
     */
    public function encriptionKey()
    {
        $response = $this->client->request('GET', '/payment/fedexoffice/v2/encryptionkey', [
            'headers' => $this->getRequestHeader(),
        ]);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Gets public key.
     */
    private function getPublicKey() : string
    {
        if (Cache::has('publicKey')) {
            return Cache::get('publicKey');
        }

        $response = $this->encriptionKey();
        $publicKey = $response->output->encryption->key;
        Cache::rememberForever('publicKey', fn () => $publicKey);

        return $publicKey;
    }

    /**
     * Gets encrypted data.
     * @param string $cardData
     * @return string Encrypted card data
     */
    public function getEncryptedData(string $cardData) : string
    {
        $key = PublicKeyLoader::load($this->getPublicKey());
        $key = $key->withPadding(RSA::ENCRYPTION_OAEP)->withHash('sha1')->withMGFHash('sha1');

        return base64_encode($key->encrypt($cardData));
    }

    /**
     * Gets location details. This methos makes a call to api v1.
     * @param int $id
     * @param string $startDate
     */
    public function getLocationDetails(int $id)
    {
        if (empty($startDate)) {
            $startDate = date('Y-m-d', time());
        }

        $response = $this->client->request('GET',
            '/location/fedexoffice/v1/locations/' . $id,
            [
                'headers' => $this->getRequestHeader(),
            ]
        );

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }
}
