<?php

namespace MediawikiSdkPhp;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Response;
use JetBrains\PhpStorm\ArrayShape;
use JsonException;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\Resources\AbstractResource;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class MediaWikiAdapter
{
    private Client $client;

    public function __construct(AbstractResource $resource)
    {
        $this->client = new Client(
            [
                'base_uri' => $resource->getApiRoot(),
                'headers' => [
                    'User-Agent' => 'WebConsul WikiMedia SDK (PHP)/1.0',
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ]
        );
    }

    /**
     * @throws MediaWikiException|JsonException
     */
    public function handle(string $httpMethod, string $url, string $responseDTOClass)
    {
        $error = [];

        try {
            /** @var MediaWikiResponse $response */
            $response = $this->$httpMethod($url);
            $data = $response->toArray();
            $status = $response->getStatusCode();

            if ($status !== 200) {
                $error = $this->generateError($data, $status);
            }
        } catch (ServerException $e) {
            /** @var Response $response */
            $response = $e->getResponse();
            $data = json_decode((string)$response->getBody(), true, 512, JSON_THROW_ON_ERROR);
            $error = $this->generateError($data, $e->getCode());
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
    public function generateError(array $data, int $status): array
    {
        // For MediaWiki response
        if (array_key_exists('httpReason', $data)) {
            return [
                'message' => $data['messageTranslations']['en'],
                'reason' => $data['httpReason'],
                'code' => $data['httpCode'],
            ];
        }

        // For WikiMedia response
        if (array_key_exists('detail', $data)) {
            return [
                'message' => $data['detail'],
                'reason' => $data['title'],
                'code' => $status
            ];
        }

        return [
            'message' => 'Unknown errored response format',
            'reason' => 'Bad response',
            'code' => 0
        ];
    }
}
