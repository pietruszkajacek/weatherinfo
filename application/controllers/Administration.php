<?php

class Administration extends MY_Controller {
	
	 public function __construct()
	 {
		 parent::__construct();
		 
		 $this->load->model('weatherinfo_model');
	 }
	 
	public function frontendcities() 
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('administration/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) 
		{
			$this->session->set_flashdata(array('type' => 'info', 'You must be an administrator to view this page.'));
			redirect('/', 'refresh');
		}
		else
		{
			if ($this->input->is_ajax_request())
			{
				if ($this->weatherinfo_model->add_cities_front_end($this->input->post('front-end-cities')))
				{
					$status = 1;
				}
				else
				{
					$status = 0;
				}
				
				$this->output
						->set_content_type('application/json')
						->set_output(json_encode(array("status" => $status)));
			}
			else
			{
				$this->data['form_attr'] = array(
					'class' => 'form-settings',
					'id' => 'form-settings',
					'role' => 'form'
				);

				$this->data['country_name'] = array(
					'id' => 'country-name',
					'class' => 'form-control',
					'type' => 'text',
					'placeholder' => 'Enter country name',
				);

				$this->data['country_name_label'] = array(
					'for' => 'country_name',
					'text' => 'Country name',
					'attributes' => array(
					),
				);
				
				$this->data['front_end_cities'] = $this->weatherinfo_model->get_front_end_cities();
				
				$this->render();
			}
		}		
	}
	
	public function provider()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('administration/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) 
		{
			$this->session->set_flashdata(array('type' => 'info', 'You must be an administrator to view this page.'));
			redirect('/', 'refresh');
		}
		else
		{	
			$this->form_validation->set_rules('wsdl', 'Wsdl', 'required');
			$this->form_validation->set_rules('con_timeout', 'Connection timeout', 'required|is_natural_no_zero');
			
			if ($this->form_validation->run() == TRUE)
			{
				$this->weatherinfo_model->update_weather_provider(1, $this->input->post('wsdl'), $this->input->post('con_timeout'));
				
				$this->session->set_flashdata(array('type' => 'info', 'msg' => 'Submit successfully'));
				redirect("administration/provider", 'refresh');		
			}
			
			$weather_provider = $this->weatherinfo_model->get_weather_provider(1);

			$this->data['message'] = array(
				'type' => $this->session->flashdata('type'),
				'msg' => $this->session->flashdata('msg'),
			);

			$this->data['form_attr'] = array(
				'class' => 'form-settings',
				'id' => 'form-settings',
				'role' => 'form'
			);

			$this->data['wsdl'] = array(
				'name' => 'wsdl',
				'id' => 'wsdl',
				'class' => 'form-control',
				'type' => 'text',
				'placeholder' => 'Enter WSDL',
				'value' => $this->form_validation->set_value('wsdl', ! is_null($weather_provider) ? $weather_provider->wsdl : ''),
			);

			$this->data['wsdl_label'] = array(
				'for' => 'wsdl',
				'text' => 'WSDL',
				'attributes' => array(
				),
			);

			$this->data['connection_timeout'] = array(
				'name' => 'con_timeout',
				'id' => 'con_timeout',
				'class' => 'form-control',
				'type' => 'text',
				'placeholder' => 'Enter connection timeout in sec.',
				'value' => $this->form_validation->set_value('con_timeout', ! is_null($weather_provider) ? $weather_provider->connection_timeout : ''),
			);

			$this->data['connection_timeout_label'] = array(
				'for' => 'con_timeout',
				'text' => 'SOAP connection timeout',
				'attributes' => array(
				),
			);

			$this->render();
		}
	}

	public function getcitiesbycountry() 
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->ion_auth->logged_in())
			{
				$weather_provider = $this->weatherinfo_model->get_weather_provider(1);
				
				$wsdl = $weather_provider->wsdl;
				$connection_timeout = intval($weather_provider->connection_timeout);
				
				try 
				{ 
					$result = array();
					
					$globalprovider = new My\GlobalWeatherProvider\Globalweather_weather_provider($wsdl, $connection_timeout);					
					$this->data['cities'] = $globalprovider->get_cities_by_country($this->input->post('country'));
					
					$result['status'] = 1;
					$result['cities'] = $this->load->view('/partials/cities_by_country', $this->data, TRUE);
				}
				catch (Exception $e) 
				{ 
				    $result['status'] = -1;
					$result['msg'] = $e->getMessage();
				} 
				
				$this->output
						->set_content_type('application/json')
						->set_output(json_encode($result)
				);
			}
			else
			{
                $this->output->set_status_header('403');
			}
		}
	}
	
	public function login()
	{
		if ($this->ion_auth->logged_in())
		{
			redirect('administration', 'refresh');
		}

		$this->title = "Login";

		//validate form input
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember_me');

			if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page				
				$this->session->set_flashdata(array('type' => 'info', 'msg' => $this->ion_auth->messages()));
				redirect('administration/provider/', 'refresh');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata(array('type' => 'error', 'msg' => $this->ion_auth->errors()));
				redirect('administration/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			$this->data['message'] = array(
				'type' => $this->session->flashdata('type'),
				'msg' => $this->session->flashdata('msg'),
			);

			$this->data['form_attr'] = array(
				'class' => 'form-signin',
				'id' => 'form-signin',
				'role' => 'form'
			);

			$this->data['email'] = array(
				'type' => 'email',
				'name' => 'email',
				'id' => 'email',
				'class' => 'form-control',
				'placeholder' => 'Email address',
				'value' => $this->form_validation->set_value('email'),
			);

			$this->data['password'] = array(
				'type' => 'password',
				'name' => 'password',
				'id' => 'password',
				'class' => 'form-control',
				'placeholder' => 'Password'
			);

			$remember = array(
				'name' => 'remember_me',
				'id' => 'remember_me',
				'value' => '1',
				'checked' => (bool) $this->input->post('remember_me') ? TRUE : FALSE,
			);

			$remember_me_checkbox = form_checkbox($remember);

			$this->data['remember_label'] = array(
				'text' => $remember_me_checkbox . 'Remember me',
			);

			$this->data['form_groups'] = array(
				'email' => form_error('email') ? ' has-error' : '',
				'password' => form_error('password') ? ' has-error' : '',
			);
			
			$this->has_nav_top_bar = FALSE;
			
			$this->render();
		}
	}
	
	public function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them to the home page
		$this->session->set_flashdata(array('type' => 'info', 'msg' => $this->ion_auth->messages()));
		redirect('/', 'refresh');		
	}
}

/* End of file Administration.php */
/* Location: ./application/controllers/Administration.php */