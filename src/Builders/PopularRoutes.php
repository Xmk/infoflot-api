<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class PopularRoutes extends Builder
{
	protected $urn = 'popular-routes';
	protected $available_params = [
		'type',
	];
}