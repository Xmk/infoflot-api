<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class NewsId extends Builder
{
	protected $urn = 'news/:id';
	protected $available_params = [
		'offers',
	];
}