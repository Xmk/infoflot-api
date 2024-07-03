<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class Cruises extends Builder
{
	protected $urn = 'cruises';
	protected $available_params = [
		'limit',
		'page',
		'sort',
		'ship',
		'operator',
		'dateStartFrom',
		'dateStartTo',
		'dateEndFrom',
		'dateEndTo',
		'type',
		'lengthMin',
		'lengthMax',
		'nightsMin',
		'nightsMax',
		'days',
		'nights',
		'startCity',
		'startCountry',
		'portStart',
		'portEnd',
		'currency',
		'minPriceFrom',
		'minPriceTo',
		'maxPriceFrom',
		'maxPriceTo',
		'regions',
		'rivers',
		'popularRoutes',
		'citiesInRoute',
		'weekend',
		'onlyFreeCabins',
		'minFreeCabins',
	];
}