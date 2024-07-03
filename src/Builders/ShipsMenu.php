<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class ShipsMenu extends Builder
{
	protected $urn = 'ships-menu';
	protected $available_params = [
		'limit',
		'page',
	];
}