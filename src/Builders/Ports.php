<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Contracts\BuilderInterface;
use CryptoWeb\InfoflotApi\Builder;

class Ports extends Builder
{
	protected $urn = 'ports';

	public function filter($filter): BuilderInterface
	{
		return (new PortsFilter($this->client))->filter($filter);
	}
}