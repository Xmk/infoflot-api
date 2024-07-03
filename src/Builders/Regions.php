<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class Regions extends Builder
{
	protected $urn = 'regions';
	protected $available_params = [
		'type',
	];
}