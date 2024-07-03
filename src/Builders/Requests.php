<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class Requests extends Builder
{
	protected $urn = 'requests';
	protected $available_params = [
		'limit',
		'page',
	];
}