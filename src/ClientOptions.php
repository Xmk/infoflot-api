<?php

namespace CryptoWeb\InfoflotApi;

final class ClientOptions
{
	public const BASE_URL = 'https://restapi.infoflot.com';

	public function __construct(
		public readonly string $baseUri = self::BASE_URL,
		public readonly ?string $apiKey = null,
	) {}
}
