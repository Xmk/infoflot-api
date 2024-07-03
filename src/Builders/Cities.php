<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class Cities extends Builder
{
	protected $urn = 'cities';
	protected $available_params = [
		'name',
		'nameEn',
	];
}