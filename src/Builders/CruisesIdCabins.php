<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Contracts\BuilderInterface;
use CryptoWeb\InfoflotApi\Builder;

class CruisesIdCabins extends Builder
{
	protected $urn = 'cruises/:id/cabins';

	/**
	 * @see https://restapi.infoflot.com/docs/cruises-id-cabins-search
	 */
	public function search(): BuilderInterface
	{
		return (new CruisesIdCabinsSearch($this->client))->setRawParams($this->getRawParams());
	}
}