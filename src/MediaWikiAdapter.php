<?php

namespace MediawikiSdkPhp;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Response;
use JetBrains\PhpStorm\ArrayShape;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\Resources\AbstractResource;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class MediaWikiAdapter
{
    private Client $client;

    public function __construct(?AbstractResource $resource = null, $language = 'en')
    {
        $this->client = new Client(
            [
                'base_uri' => str_replace('{lang}', $language, $resource->getApiRoot()),
                'headers' => [
                    'User-Agent' => 'WebConsul WikiMedia SDK (PHP)/1.0',
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ]
        );
    }

    /**
     * @throws MediaWikiException
     */
    public function handle(string $httpMethod, string $url, string $responseDTOClass)
    {
        $error = [];

        try {
            /** @var MediaWikiResponse $response */
            $response = $this->$httpMethod($url);
            $data = $response->toArray();

            if ($response->getStatusCode() !== 200) {
                $error = $this->generateError($data);
            }
        } catch (ServerException $e) {
            /** @var Response $response */
            $response = $e->getResponse();
            $data = json_decode((string)$response->getBody(), true);
            $error = $this->generateError($data);
        }

        if ($error) {
            throw new MediaWikiException($error);
        }

        try {
            $res = new $responseDTOClass($data);
        } catch (UnknownProperties $e) {
            $error = [
                'reason' => 'Response validation: Unknown properties',
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ];
            throw new MediaWikiException($error);
        }

        return $res;
    }

    public function get(string $url, array $options = []): MediaWikiResponse
    {
        return $this->request('GET', $url, $options);
    }

    public function post(string $url, array $options = []): MediaWikiResponse
    {
        return $this->request('POST', $url, $options);
    }

    private function request(string $method, $uri = '', array $options = []): MediaWikiResponse
    {
        $method = strtolower($method);
        try {
            $response = $this->client->$method($uri, $options);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }

        return new MediaWikiResponse($response);
    }

    /**
     * Generates error object from "bad" MediaWiki response (status of response >=400)
     */
    #[ArrayShape(['message' => "mixed", 'reason' => "mixed", 'code' => "mixed"])]
    public function generateError(array $data): array
    {
        return [
            'message' => $data['messageTranslations']['en'],
            'reason' => $data['httpReason'],
            'code' => $data['httpCode'],
        ];
    }
}
