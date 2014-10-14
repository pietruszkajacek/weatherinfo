<?php

namespace My\SOAPWeatherProvider;
	
abstract class Weather_provider implements Weather_provider_interface
{
	//abstract public function __construct();
	//abstract public function normalize_properties($obj)
	
	abstract public function get_weather($country, $city);
	abstract public function get_cities_by_country($country);
}
	
	
