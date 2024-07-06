<?php

namespace CryptoWeb\InfoflotApi;

use CryptoWeb\InfoflotApi\Contracts\BuilderInterface;
use CryptoWeb\InfoflotApi\Builders\Cities;
use CryptoWeb\InfoflotApi\Builders\CitiesDepartures;
use CryptoWeb\InfoflotApi\Builders\CitiesDeparturesId;
use CryptoWeb\InfoflotApi\Builders\CitiesId;
use CryptoWeb\InfoflotApi\Builders\CitiesInRoutes;
use CryptoWeb\InfoflotApi\Builders\CitiesInRoutesId;
use CryptoWeb\InfoflotApi\Builders\Citizenships;
use CryptoWeb\InfoflotApi\Builders\CitizenshipsId;
use CryptoWeb\InfoflotApi\Builders\Countries;
use CryptoWeb\InfoflotApi\Builders\CountriesId;
use CryptoWeb\InfoflotApi\Builders\Cruises;
use CryptoWeb\InfoflotApi\Builders\CruisesId;
use CryptoWeb\InfoflotApi\Builders\Currencies;
use CryptoWeb\InfoflotApi\Builders\CurrenciesId;
use CryptoWeb\InfoflotApi\Builders\News;
use CryptoWeb\InfoflotApi\Builders\NewsId;
use CryptoWeb\InfoflotApi\Builders\OnboardServices;
use CryptoWeb\InfoflotApi\Builders\OnboardServicesId;
use CryptoWeb\InfoflotApi\Builders\PopularRoutes;
use CryptoWeb\InfoflotApi\Builders\PopularRoutesId;
use CryptoWeb\InfoflotApi\Builders\Ports;
use CryptoWeb\InfoflotApi\Builders\PortsId;
use CryptoWeb\InfoflotApi\Builders\PublicPlaces;
use CryptoWeb\InfoflotApi\Builders\PublicPlacesId;
use CryptoWeb\InfoflotApi\Builders\Regions;
use CryptoWeb\InfoflotApi\Builders\RegionsId;
use CryptoWeb\InfoflotApi\Builders\Requests;
use CryptoWeb\InfoflotApi\Builders\RequestsId;
use CryptoWeb\InfoflotApi\Builders\Reservation;
use CryptoWeb\InfoflotApi\Builders\Rivers;
use CryptoWeb\InfoflotApi\Builders\RiversId;
use CryptoWeb\InfoflotApi\Builders\Ships;
use CryptoWeb\InfoflotApi\Builders\ShipsActive;
use CryptoWeb\InfoflotApi\Builders\ShipsActiveId;
use CryptoWeb\InfoflotApi\Builders\ShipsId;
use CryptoWeb\InfoflotApi\Builders\ShipsMenu;

class Factory
{
	public function __construct(
		protected Client $client
	) {}

	public function cities(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new CitiesId($this->client))->id($id);
		} else {
			return new Cities($this->client);
		}
	}

	public function citiesDepartures(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new CitiesDeparturesId($this->client))->id($id);
		} else {
			return new CitiesDepartures($this->client);
		}
	}

	public function citiesInRoutes(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new CitiesInRoutesId($this->client))->id($id);
		} else {
			return new CitiesInRoutes($this->client);
		}
	}

	public function cruises(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new CruisesId($this->client))->id($id);
		} else {
			return new Cruises($this->client);
		}
	}

	public function onboardServices(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new OnboardServicesId($this->client))->id($id);
		} else {
			return new OnboardServices($this->client);
		}
	}

	public function publicPlaces(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new PublicPlacesId($this->client))->id($id);
		} else {
			return new PublicPlaces($this->client);
		}
	}

	public function rivers(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new RiversId($this->client))->id($id);
		} else {
			return new Rivers($this->client);
		}
	}

	public function ports(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new PortsId($this->client))->id($id);
		} else {
			return new Ports($this->client);
		}
	}

	public function countries(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new CountriesId($this->client))->id($id);
		} else {
			return new Countries($this->client);
		}
	}

	public function citizenships(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new CitizenshipsId($this->client))->id($id);
		} else {
			return new Citizenships($this->client);
		}
	}

	public function currencies(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new CurrenciesId($this->client))->id($id);
		} else {
			return new Currencies($this->client);
		}
	}

	public function regions(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new RegionsId($this->client))->id($id);
		} else {
			return new Regions($this->client);
		}
	}

	public function reservation(int $cruiseId, string $startDate): BuilderInterface
	{
		return (new Reservation($this->client))
			->cruiseId($cruiseId)
			->startDate($startDate);
	}

	public function news(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new NewsId($this->client))->id($id);
		} else {
			return new News($this->client);
		}
	}

	public function ships(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new ShipsId($this->client))->id($id);
		} else {
			return new Ships($this->client);
		}
	}

	public function shipsActive(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new ShipsActiveId($this->client))->id($id);
		} else {
			return new ShipsActive($this->client);
		}
	}

	public function shipsMenu(): BuilderInterface
	{
		return new ShipsMenu($this->client);
	}


	public function popularRoutes(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new PopularRoutesId($this->client))->id($id);
		} else {
			return new PopularRoutes($this->client);
		}
	}

	public function requests(?int $id = null): BuilderInterface
	{
		if ($id) {
			return (new RequestsId($this->client))->id($id);
		} else {
			return new Requests($this->client);
		}
	}
}