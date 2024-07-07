# infloflot-api

[![Latest Version](https://img.shields.io/packagist/v/cryptoweb/infoflot-api)](https://packagist.org/packages/cryptoweb/infoflot-api)
[![License](https://img.shields.io/packagist/l/cryptoweb/infoflot-api)](https://packagist.org/packages/cryptoweb/infoflot-api)

## ATTENTION!

⚠️ This package is at an early stage of development!

### basic docs:

https://restapi.infoflot.com/docs

## Installation

```bash
composer require cryptoweb/infoflot-api
```

## Integration
We have package for simple integration with Laravel:
[cryptoweb/infoflot-laravel](https://packagist.org/packages/cryptoweb/infoflot-laravel)

## Usage

### client initialization
```php
require 'vendor/autoload.php';

use CryptoWeb\InfoflotApi\Client;
use CryptoWeb\InfoflotApi\ClientOptions;

$client = new Client(
	new GuzzleHttp\Client(),
	new ClientOptions(
		apiKey: 'your-api-key',
	)
);
```

### factory
```php
use CryptoWeb\InfoflotApi\Enums\ShipTypeAsOnMainSiteEnum;
use CryptoWeb\InfoflotApi\Factory;

$infoflot = new Factory($client);

$infoflot->cruises()
	->type(ShipTypeAsOnMainSiteEnum::TURKISH_RIVERA)
	->nights(5)
	->get();

$infoflot->cruises(100500)
	->get();

$infoflot->cruises(100500)
	->cabins()
	->get();

$infoflot->cruises(100500)
	->cabins()
	->search()
	->get();

// etc...
```

### builders
```php
use CryptoWeb\InfoflotApi\Builders\Cruises;
use CryptoWeb\InfoflotApi\Builders\CruisesId;
use CryptoWeb\InfoflotApi\Builders\CruisesIdCabins;
use CryptoWeb\InfoflotApi\Builders\CruisesIdCabinsSearch;
use CryptoWeb\InfoflotApi\Enums\CruiseTypeEnum;

// get all cruises
$cruisesBuilder = new Cruises($client);
$cruisesBuilder->type(CruiseTypeEnum::RIVER)
$cruisesBuilder->nights(5);
$cruisesResult = $cruisesBuilder->get();

// or
$cruisesResult = (new Cruises($client))
	->type(CruiseTypeEnum::SEA)
	->nights(5, 6, 7)
	->get();

// get cruise by id
$cruiseBuilder = new CitiesId($client);
$cruiseBuilder->id(311);
$cruiseResult = $cruiseBuilder->get();

// get cruise cabins by id
$cruiseCabinsResult = (new CruisesIdCabins($client))
	->id(311)
	->get();

// etc...
```

### usage basic
```php
$result = $client->request('cruises', [
	'ship' => '311,312,400',
	'type' => 'sea'
]);
```

## License

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
