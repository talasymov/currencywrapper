<?php


namespace App\Services\API\Currency;


use GuzzleHttp\Client;

class ClientService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.exchangeratesapi.io/'
        ]);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function sendRequest(string $uri, array $query)
    {
        $response = $this->getClient()->get($uri, [
            'query' => $query
        ]);

        if ($response->getStatusCode() !== 200) {
            return [
                'success' => false,
                'msg' => 'API Service return error with status code ' . $response->getStatusCode()
            ];
        }

        $content = json_decode($response->getBody()->getContents(), true);

        return [
            'success' => true,
            'status' => $response->getStatusCode(),
            'data' => $content
        ];
    }
}
