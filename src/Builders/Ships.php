<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Contracts\BuilderInterface;
use CryptoWeb\InfoflotApi\Enums\OperationEnum;
use CryptoWeb\InfoflotApi\Builder;

class Ships extends Builder
{
	protected $urn = 'ships';
	protected $available_params = [
		'limit',
		'page',
	];

	/**
	 * @see https://restapi.infoflot.com/docs/ships-additional-id-operation
	 */
	public function additional(int|string $id, string|OperationEnum $operation): BuilderInterface
	{
		return (new ShipsAdditionalIdOperation($this->client))
			->id($id)
			->operation($operation);
	}
}