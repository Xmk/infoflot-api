<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class Countries extends Builder
{
	protected $urn = 'countries';
	protected $available_params = [
		'type',
	];
}