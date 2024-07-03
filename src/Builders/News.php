<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class News extends Builder
{
	protected $urn = 'news';
	protected $available_params = [
		'limit',
		'offers',
	];
}