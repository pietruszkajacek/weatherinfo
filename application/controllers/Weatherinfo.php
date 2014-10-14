<?php

class Weatherinfo extends MY_Controller {
	
	 function __construct()
	{
		parent::__construct();
		
		$this->load->model('weatherinfo_model');
	}

	public function index()
	{
		$this->data['message'] = array(
			'type' => $this->session->flashdata('type'),
			'msg' => $this->session->flashdata('msg'),
		);
		
		$weather_provider = $this->weatherinfo_model->get_weather_provider(1);
		
		$this->data['front_end_cities'] = $this->weatherinfo_model->get_front_end_cities();
		
		$this->render();
	}
	
	public function refreshweather()
	{
		if ($this->input->is_ajax_request())
		{
			$weather_provider = $this->weatherinfo_model->get_weather_provider(1);

			$wsdl = $weather_provider->wsdl;
			$connection_timeout = intval($weather_provider->connection_timeout);

			try
			{
				$result = array();

				$globalprovider = new My\GlobalWeatherProvider\Globalweather_weather_provider($wsdl, $connection_timeout);
				$weather = $globalprovider->get_weather($this->input->post('country'), $this->input->post('city'));
				
				$weather->city = $this->input->post('city');
				$weather->country = $this->input->post('country');
				
				$this->weatherinfo_model->update_weather($weather);
				
				$result['status'] = 1;
				$result['weather'] = $weather;
			}
			catch (Exception $e)
			{
				$result['weather'] = $this->weatherinfo_model->get_city_weather($this->input->post('country'), $this->input->post('city'));
				$result['status'] = -1;
				$result['msg'] = $e->getMessage();
			}

			$this->output
					->set_content_type('application/json')
					->set_output(json_encode($result)
			);
		}
	}
	
}

/* End of file Weatherinfo.php */
/* Location: ./application/controllers/Weatherinfo.php */