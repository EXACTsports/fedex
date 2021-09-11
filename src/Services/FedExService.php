<?php 

namespace EXACTSports\FedEx\Services;

use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Crypt\RSA;
use EXACTSports\FedEx\FedExTrait;

class FedExService
{
    private Client $client;
    
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env("FEDEX_API_BASE_URL")
        ]);
    }

    /**
     * OAuth
     */
    public function token() 
    {
        $response = $this->client->request('POST', '/auth/oauth/v2/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env("FEDEX_CLIENT_ID"),
                'client_secret' => env("FEDEX_CLIENT_SECRET"),
                'scope' => 'oob'
            ]
        ]);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Gets token
     */
    private function getToken() : string
    {
        if (Redis::exists("fedex.accessToken")) {
            $expiresIn = Redis::get("fedex.expiresIn");
            $expiresIn = date("Y-m-d H:i:s", $expiresIn);
            $currentTime = date("Y-m-d H:i:s");

            if ($currentTime < $expiresIn) {
                return Redis::get("fedex.accessToken");
            }
        }

        $response = $this->token();
        $expiresIn = strtotime(date("Y-m-d H:i:s")) + $response->expires_in;
        $accessToken = $response->access_token;
        
        Redis::set("fedex.expiresIn", $expiresIn);
        Redis::set("fedex.accessToken", $accessToken);

        return $response->access_token;
    }

    /**
     * Uploads document from local drive
     * @param string $file
     */
    public function uploadDocumentFromLocalDrive(array $documentFromLocalDrive) : object
    {
        $client = new Client([
            'base_uri' => env("FEDEX_DOCUMENT_UPLOAD_HOSTNAME")
        ]);

        $response = $client->request('POST', '/document/fedexoffice/v1/documents', [
            'headers' => array(
                "Content-Type" => "multipart/form-data"
            ),
            'multipart' => array($documentFromLocalDrive)
        ]);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Uploads document from cloud drive
     * @param string $link
     * @param string $fileName
     */
    public function uploadDocumentFromCloudDrive(string $link, string $fileName) : object
    {
        $client = new Client([
            'base_uri' => env("FEDEX_DOCUMENT_UPLOAD_HOSTNAME")
        ]);

        $response = $client->request('POST', '/document/fedexoffice/v1/documents', [
            'headers' => $this->getRequestHeader(),
            'json' => array(
                "input" => array(
                    "download" => array(
                        "link" => $link,
                        "fileName" => $fileName
                    )
                )
            )
        ]);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Converts to PDF
     * @param string $documentId
     */
    public function convertToPDF(string $documentId, array $options) : object
    {
        $response = $this->client->request('POST', '/document/fedexoffice/v1/documents/' . $documentId . '/printready', [
            'headers' => $this->getRequestHeader(),
            'json' => $options
        ]);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Gets document preview
     * @param string $documentId
     * @param int $pageNumber
     */
    public function getDocumentPreview(string $documentId, int $pageNumber = 1) : object
    {
        $client = new Client([
            'base_uri' => env("FEDEX_DOCUMENT_PREVIEW_HOSTNAME")
        ]);

        $response = $client->request('GET', '/document/fedexoffice/v1/documents/' . $documentId . '/preview?pageNumber=' . $pageNumber);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Gets rate estimate
     * @param array $rateRequest 
     */
    public function getRate(array $rateRequest)
    {
        $response = $this->client->request('POST', '/rate/fedexoffice/v2/rates', [
            'headers' => $this->getRequestHeader(),
            'json' => $rateRequest
        ]);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Gets delivery options pickup requiest
     */
    public function getDeliveryOptions(array $deliveryOptions)
    {
        $response = $this->client->request('POST', '/order/fedexoffice/v2/deliveryoptions', [
            'headers' => $this->getRequestHeader(),
            'json' => $deliveryOptions
        ]);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Allows the API user to submit the print order and remit payment for it.
     * @param array $orderSubmissionRequest
     */
    public function orderSubmisions(array $orderSubmissionRequest)
    {
        $response = $this->client->request('POST', '/order/fedexoffice/v2/ordersubmissions', [
            'headers' => $this->getRequestHeader(),
            'json' => $orderSubmissionRequest
        ]);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Gets request header
     */
    private function getRequestHeader()
    {
        $token = $this->getToken();

        return array(
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . $token
        );
    }

    /**
     * Gets encription key
     */
    public function encriptionKey()
    {
         $response = $this->client->request('GET', '/payment/fedexoffice/v2/encryptionkey', [
            'headers' => $this->getRequestHeader()
        ]);

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }

    /**
     * Gets public key
     */
    private function getPublicKey() : string
    {
        if (Redis::exists("publicKey")) {
            return Redis::get("publicKey");
        }

        $response = $this->encriptionKey();
        $publicKey = $response->output->encryption->key;
        Redis::set("publicKey", $publicKey);

        return $publicKey;
    }

    /**
     * Gets encrypted data
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
     * Gets location details. This methos makes a call to api v1
     * @param int $id
     * @param string $startDate
     */
    public function getLocationDetails(int $id, string $startDate = "")
    {   
        if (empty($startDate)) {
            $startDate = date("Y-m-d", time());
        }

        $response = $this->client->request('GET', 
            '/location/fedexoffice/v1/locations/' . $id . '?startDate='. $startDate,
            [
                'headers' => $this->getRequestHeader()
            ]
        );

        $response = (string) $response->getBody();
        $response = json_decode($response);

        return $response;
    }
}
