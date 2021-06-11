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
     * Gets token
     */
    public function getToken() 
    {
        $response = $this->client->request('POST', '/auth/oauth/v2/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env("FEDEX_CLIENT_ID"),
                'client_secret' => env("FEDEX_CLIENT_SECRET"),
                'scope' => 'oob'
            ]
        ]);

        $body = (string )$response->getBody();
        $body = json_decode($body, true);

        return $body;
    }
}
