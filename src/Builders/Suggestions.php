<?php

namespace CryptoWeb\InfoflotApi\Builders;

use CryptoWeb\InfoflotApi\Builder;

class Suggestions extends Builder
{
    protected $urn = 'suggestions';

    protected $available_params = [
        'type',
    ];
}
