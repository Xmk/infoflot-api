<?php

namespace CryptoWeb\InfoflotApi;

use CryptoWeb\InfoflotApi\Contracts\MethodInterface;
use CryptoWeb\InfoflotApi\Exceptions\MethodArgumentNotAvailable;
use CryptoWeb\InfoflotApi\Exceptions\MethodParamNotAvailable;
use CryptoWeb\InfoflotApi\Exceptions\MethodParamNotValue;

abstract class Method implements MethodInterface
{
	protected $urn = '';
	protected $available_arguments = [];
	protected $available_params = [];

	public function __construct(
		protected Client $client,
		protected array $arguments = [],
		protected array $params = [],
	) {}

	public function print()
	{
		return $this->args;
	}

	public function get(): array
	{
		$this->validate();
		return $this->client->request($this->getUrn(), $this->getParams());
	}

	public function __call(string $name, array $arguments)
	{
		if (! method_exists(get_called_class(), $name)) {
			if (property_exists(get_called_class(), 'available_params') && in_array($name, $this->available_params)) {
				if (empty($arguments)) {
					throw new MethodParamNotValue("Method param {$name} require value");
				}
				$this->params[$name] = $arguments[0];
				return $this;
			}
		}
		throw new MethodParamNotAvailable("Method param {$name} not available");
	}

	protected function validate()
	{
		$this->validateArguments();
		$this->validateParams();
	}

	protected function validateArguments()
	{
		foreach ($this->arguments as $name => $value) {
			if (! in_array($name, $this->available_arguments)) {
				throw new MethodArgumentNotAvailable("Method argument {$name} not available");
			}
		}
	}

	protected function validateParams()
	{
		foreach ($this->params as $name => $value) {
			if (! in_array($name, $this->available_params)) {
				throw new MethodParamNotAvailable("Method param {$name} not available");
			}
		}
	}

	protected function getUrn()
	{
		return strtr($this->urn, $this->arguments);
	}

	protected function getParams()
	{
		return $this->params;
	}
}