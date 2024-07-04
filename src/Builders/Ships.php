<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Contracts\BuilderInterface;
use CryptoWeb\InfoflotApi\Enums\Operation;
use CryptoWeb\InfoflotApi\Builder;

class Ships extends Builder
{
	protected $urn = 'ships';
	protected $available_params = [
		'limit',
		'page',
	];

	public function additional(int|string $id, string|OperationEnum $operation): BuilderInterface
	{
		$operationValue = $operation instanceof \UnitEnum ? $operation->value : $operation;

		return (new ShipsAdditionalIdOperation($this->client))
			->id($id)
			->operation($operationValue);
	}
}