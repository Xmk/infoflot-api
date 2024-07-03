<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class Reservation extends Builder
{
	protected $urn = 'reservation/:cruiseId/:startDate';
}