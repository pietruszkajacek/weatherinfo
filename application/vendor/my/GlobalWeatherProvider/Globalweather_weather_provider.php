<?php

namespace My\GlobalWeatherProvider;

use My\SOAPWeatherProvider\Weather_provider;

class Globalweather_weather_provider extends Weather_provider
{
	protected $client;
	
	public function __construct($wsdl, $connection_timeout)
	{
		//parent::__construct();
		ini_set("default_socket_timeout", $connection_timeout);
		$this->client = new \SoapClient($wsdl, array('connection_timeout' => $connection_timeout));
	}
	
	public function get_weather($country, $city)
	{
		$response = $this->client->GetWeather(array('CityName' => $city, 'CountryName' => $country));
		$xml = $response->GetWeatherResult;
			
		return new \SimpleXMLElement(preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $xml));
	}
	
	public function get_cities_by_country($country)
	{
		$response = $this->client->GetCitiesByCountry(array('CountryName' => $country));
		
		$xml = $response->GetCitiesByCountryResult;
		
		return new \SimpleXMLElement($xml);
	}
}

