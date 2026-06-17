<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;
use CryptoWeb\InfoflotApi\Contracts\BuilderInterface;

class CruisesId extends Builder
{
    protected $urn = 'cruises/:id';

    /**
     * @see https://restapi.infoflot.com/docs/cruises-id-cabins
     */
    public function cabins(): BuilderInterface
    {
        return (new CruisesIdCabins($this->client))->setRawParams($this->getRawParams());
    }
}
