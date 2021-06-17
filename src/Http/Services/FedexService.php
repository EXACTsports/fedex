<?php 

namespace EXACTSports\FedEx\Http\Services;

use GuzzleHttp\Client;


class FedexService
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

        $response = (string )$response->getBody();
        $response = json_decode($response, true);

        return $response;
    }

    /**
     * Gets token
     */
    public function getToken() : string
    {
        $response = $this->token();

        return $response["access_token"];
    }

    /**
     * Uploads document from local drive
     * @param string $file
     */
    public function uploadDocumentFromLocalDrive(string $filePath, string $fileName)
    {
        $client = new Client([
            'base_uri' => env("FEDEX_DOCUMENT_UPLOAD_HOSTNAME")
        ]);

        $response = $client->request('POST', '/document/fedexoffice/v1/documents', [
            'headers' => array(
                "Content-Type" => "multipart/form-data"
            ),
            'multipart' => array(
                array(
                    "name" => "localfile",
                    "contents" => file_get_contents($filePath),
                    "filename" => $fileName
                )
            )
        ]);

        $response = (string )$response->getBody();
        $response = json_decode($response, true);

        return $response;
    }

    /**
     * Uploads document from cloud drive
     * @param string $link
     * @param string $fileName
     */
    public function uploadDocumentFromCloudDrive(string $link, string $fileName)
    {
        $token = $this->getToken();

        $client = new Client([
            'base_uri' => env("FEDEX_DOCUMENT_UPLOAD_HOSTNAME")
        ]);

        $response = $client->request('POST', '/document/fedexoffice/v1/documents', [
            'headers' => array(
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . $token
            ),
            'json' => array(
                "input" => array(
                    "download" => array(
                        "link" => $link,
                        "fileName" => $fileName
                    )
                )
            )
        ]);

        $response = (string )$response->getBody();
        $response = json_decode($response, true);

        return $response;
    }

    /**
     * Converts to PDF
     * @param string $documentId
     */
    public function convertToPDF(string $documentId, array $options)
    {
        $token = $this->getToken();

        $response = $this->client->request('POST', '/document/fedexoffice/v1/documents/' . $documentId . '/printready', [
            'headers' => array(
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . $token
            ),
            'json' => $options
        ]);

        $response = (string )$response->getBody();
        $response = json_decode($response, true);

        return $response;
    }

    /**
     * Gets delivery options pickup requiest
     */
    public function getDeliveryOptions(array $deliveryOptions)
    {
        $token = $this->getToken();

        $response = $this->client->request('POST', '/order/fedexoffice/v2/deliveryoptions', [
            'headers' => array(
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . $token
            ),
            'json' => $deliveryOptions
        ]);

        $response = (string )$response->getBody();
        $response = json_decode($response, true);

        return $response;
    }

    /**
     * Gets document preview
     * @param string $documentId
     * @param int $pageNumber
     */
    public function getDocumentPreview(string $documentId, int $pageNumber = 1)
    {
         $client = new Client([
            'base_uri' => env("FEDEX_DOCUMENT_PREVIEW_HOSTNAME")
        ]);

        $response = $client->request('GET', '/document/fedexoffice/v1/documents/' . $documentId . '/preview?pageNumber=' . $pageNumber);

        $response = (string )$response->getBody();
        $response = json_decode($response, true);

        return $response;
    }
}
