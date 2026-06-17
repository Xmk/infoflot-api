<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;
use CryptoWeb\InfoflotApi\Contracts\BuilderInterface;

class Discounts extends Builder
{
    protected $urn = 'discounts';

    protected $available_params = [
        'ship',
        'cruise',
    ];

    /**
     * @see https://restapi.infoflot.com/docs/discounts-rules
     */
    public function rules(): BuilderInterface
    {
        return new DiscountsRules($this->client);
    }
}
