<?php

namespace CryptoWeb\InfoflotApi;

use CryptoWeb\InfoflotApi\Exceptions\ClientException;
use GuzzleHttp\ClientInterface;
use Psr\Http\Client\ClientExceptionInterface;

class Client
{
	public function __construct(
		private readonly ClientInterface $httpClient,
		private readonly ClientOptions $options
	) {}

	public function request(string $url = '', array $params = [])
	{
		$headers = [];

		if ($this->options->apiKey) {
			$headers["X-Api-Key"] = $this->options->apiKey;
		}

		if ($this->options->userAgent) {
			$headers["User-Agent"] = $this->options->userAgent;
		}

		try {
			$response = $this->httpClient->request(
				'GET',
				$this->options->baseUri . '/' . $url,
				[
					'headers' => $headers,
					'query'=> $params,
				]
			);

			$statusCode = $response->getStatusCode();

			if (200 === $statusCode) {
				return $this->hydrateResult($response->getBody()->getContents());
			}
		} catch (\JsonException $exception) {
			throw new ClientException(
				"JSON body serialization error: " . $exception->getMessage(),
				$exception->getCode(),
				$exception
			);
		} catch (ClientExceptionInterface $exception) {
			throw new ClientException(
				"Infoflot client request error: " . $exception->getMessage(),
				0,
				$exception
			);
		}
	}

	private function hydrateResult($result)
	{
		return json_decode($result, true);
	}
}