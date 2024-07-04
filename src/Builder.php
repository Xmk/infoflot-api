<?php

namespace CryptoWeb\InfoflotApi;

use CryptoWeb\InfoflotApi\Contracts\BuilderInterface;
use CryptoWeb\InfoflotApi\Exceptions\BuilderParamNotAvailable;
use CryptoWeb\InfoflotApi\Exceptions\BuilderParamNotValue;

abstract class Builder implements BuilderInterface
{
	protected $urn = '';
	protected $available_arguments = [];
	protected $available_params = [];
	private $query_params = [];
	private $arguments = [];
	private $params = [];

	public function __construct(
		protected Client $client,
	) {}

	public function get(): array
	{
		return $this->getResult();
	}

	public function __call(string $name, array $arguments)
	{
		if (! method_exists(get_called_class(), $name)) {
			if (empty($arguments)) {
				throw new BuilderParamNotValue("Builder param {$name} require value");
			}
			$this->query_params[$name] = count($arguments) > 1 ? join(',', $arguments) : $arguments[0];
			return $this;
		}
		throw new BuilderParamNotAvailable("Builder param {$name} not available");
	}

	protected function matchArgumentsFromUrl()
	{
		preg_match_all('/:(\w+)/', $this->urn, $matches);

		if (! $matches) {
			return [];
		}

		return $matches[1] ?? $matches[0];
	}

	protected function extractArguments()
	{
		$args = $this->matchArgumentsFromUrl();

		$this->available_arguments = array_map(fn ($name) => ltrim($name, ':'), $args);

		return $this;
	}

	protected function buildParams()
	{
		foreach ($this->available_arguments as $name) {
			if (isset($this->query_params[$name])) {
				$this->arguments[":{$name}"] = $this->query_params[$name];
			}
		}

		foreach ($this->available_params as $name) {
			if (isset($this->query_params[$name])) {
				$this->params[$name] = $this->query_params[$name];
			}
		}

		return $this;
	}

	protected function getUrn()
	{
		return strtr($this->urn, $this->arguments);
	}

	protected function getParams()
	{
		return array_filter($this->params);
	}

	protected function getResult()
	{
		return $this->extractArguments()
					->buildParams()
					->client
					->request($this->getUrn(), $this->getParams());
	}

	protected function getRawParams()
	{
		return $this->query_params;
	}

	protected function setRawParams(array $params = [])
	{
		$this->query_params = array_merge_recursive($this->query_params, $params);

		return $this;
	}
}