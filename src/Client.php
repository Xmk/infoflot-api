<?php

namespace CryptoWeb\InfoflotApi;

use CryptoWeb\InfoflotApi\Exceptions\ClientException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Utils;
use Psr\Http\Client\ClientExceptionInterface;

class Client
{
    public function __construct(
        private readonly ClientInterface $httpClient,
        private readonly ClientOptions $options
    ) {
    }

    public function request(string $urn = '', array $params = [], string $method = 'GET')
    {
        $headers = [
            'Content-Type' => 'application/json; charset=utf-8',
        ];

        if ($this->options->apiKey) {
            $headers['X-Api-Key'] = $this->options->apiKey;
        }

        if ($this->options->userAgent) {
            $headers['User-Agent'] = $this->options->userAgent;
        }

        try {
            $response = $this->httpClient->request($method, $urn, [
                'base_uri' => $this->options->baseUri,
                'headers' => $headers,
                'query' => $params,
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                return $this->hydrateResult($response->getBody()->getContents());
            }
        } catch (\JsonException $exception) {
            throw new ClientException(
                'JSON body serialization error: '.$exception->getMessage(),
                $exception->getCode(),
                $exception
            );
        } catch (ClientExceptionInterface $exception) {
            throw new ClientException(
                'Infoflot client request error: '.$exception->getMessage(),
                0,
                $exception
            );
        }
    }

    private function hydrateResult($result)
    {
        return Utils::jsonDecode($result, true);
    }
}
