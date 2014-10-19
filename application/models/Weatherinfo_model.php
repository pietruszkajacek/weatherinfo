<?php

class Weatherinfo_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function update_weather_provider($id, $wsdl, $connection_timeout = 5, $name = NULL)
	{
		$data = array(
			'wsdl' => $wsdl,
			'connection_timeout' => $connection_timeout,
		);

		if (! is_null($name)) 
		{
			$data['name'] = $name;
		}
		
		$this->db->where('id', $id);
		$this->db->update('weather_providers', $data);
		
		return $this->db->affected_rows() == 1;
	}
	
	public function update_weather($weather)
	{
		$data = array();
		
		if (! is_null($weather->Location))
		{
			$data['location'] = $weather->Location;
		}
		
		if (! is_null($weather->Wind))
		{
			$data['wind'] = $weather->Wind;
		}
		
		if (! is_null($weather->Visibility))
		{
			$data['visibility'] = $weather->Visibility;
		}
		
		if (! is_null($weather->SkyConditions))
		{
			$data['skyconditions'] = $weather->SkyConditions;
		}

		if (! is_null($weather->Temperature))
		{
			$data['temperature'] = $weather->Temperature;
		}
		
		if (! is_null($weather->DewPoint))
		{
			$data['dewpoint'] = $weather->DewPoint;
		}

		if (! is_null($weather->RelativeHumidity))
		{
			$data['relativehumidity'] = $weather->RelativeHumidity;
		}

		if (! is_null($weather->Pressure))
		{
			$data['pressure'] = $weather->Pressure;
		}
		
		$this->db->where('country_name', $weather->country);
		$this->db->where('city_name', $weather->city);
		
		$this->db->update('cities_weather', $data);
	}

	public function get_city_weather($country, $city)
	{
		$this->db->where('country_name', $country);
		$this->db->where('city_name', $city);
		$query = $this->db->get('cities_weather');

		if ($query->num_rows() > 0)
		{
			return  $query->row();
		}
		else
		{
			return NULL;
		}		
	}	
	
	public function get_weather_provider($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('weather_providers');

		if ($query->num_rows() > 0)
		{
			return  $query->row();
		}
		else
		{
			return NULL;
		}		
	}
	
	public function get_front_end_cities()
	{
		$this->db->where('show_front_end', 1);
		$this->db->order_by('order_front_end', 'ASC');
		$query = $this->db->get('cities_weather');

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return array();
		}		
	}
	
	public function add_cities_front_end($cities = array())
	{
		$this->db->trans_begin();

		$this->db->update('cities_weather', array('show_front_end' => 0, 'order_front_end' => NULL), array('show_front_end' => 1));
		
		if (count($cities) !== 0)
		{
			foreach ($cities as $order => $city)
			{
				$sql = 'INSERT IGNORE INTO `cities_weather` '
						. '(`id`, `country_name`, `city_name`, `order_front_end`, `show_front_end`) '
						. 'VALUES (null, '.$this->db->escape($city['country']).', '.$this->db->escape($city['city']).', '
						. $order . ', 1) ON DUPLICATE KEY UPDATE order_front_end=VALUES(order_front_end), show_front_end=VALUES(show_front_end);';

				$this->db->query($sql);
			}
			
		}

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$result = FALSE;
		}
		else
		{
			$this->db->trans_commit();
			$result = TRUE;
		}
		
		return $result;
	}
}