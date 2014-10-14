<?php

namespace My\SOAPWeatherProvider;

interface Weather_provider_interface
{
    public function get_weather($country, $city);
	public function get_cities_by_country($country);
}

