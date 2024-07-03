<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class ShipsActive extends Builder
{
	protected $urn = 'ships-active';
	protected $available_params = [
		'type',
		'limit',
		'page',
	];
}