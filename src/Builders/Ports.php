<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;
use CryptoWeb\InfoflotApi\Contracts\BuilderInterface;

class Ports extends Builder
{
    protected $urn = 'ports';

    /**
     * @see https://restapi.infoflot.com/docs/ports-filter-filter
     */
    public function filter($filter): BuilderInterface
    {
        return (new PortsFilter($this->client))->filter($filter);
    }
}
