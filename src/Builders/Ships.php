<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Contracts\BuilderInterface;
use CryptoWeb\InfoflotApi\Builder;

class Ships extends Builder
{
	protected $urn = 'ships';
	protected $available_params = [
		'limit',
		'page',
	];

	public function additional(int|string $id, string $operation): BuilderInterface
	{
		return (new ShipsAdditionalIdOperation($this->client))
			->id($id)
			->operation($operation);
	}
}