<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	//Page info
	protected $data = array();
	protected $page_name = FALSE;
	protected $template = "main";
	protected $has_nav_top_bar = TRUE;
	
	//Page contents
	protected $javascript = array();
	protected $css = array();
	protected $fonts = array();
	
	//Page Meta
	protected $title = FALSE;
	protected $description = FALSE;
	protected $keywords = FALSE;
	protected $author = FALSE;
	
	// Other
	protected $controller_name;
    protected $action_name;
		
	public function __construct()
	{
        parent::__construct();

		$this->config->load('weatherinfo', TRUE);
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));

		$this->form_validation->set_error_delimiters('', '');
		
		//set the current controller and action name
		$this->controller_name = $this->router->fetch_directory() . $this->router->fetch_class();
		$this->action_name = $this->router->fetch_method();

		$meta_config = $this->config->item('meta', 'weatherinfo');

		$this->title = $meta_config['title'];
		$this->description = $meta_config['site_description'];
		$this->keywords = $meta_config['site_keywords'];
		$this->author = $meta_config['site_author'];
		$this->page_name = strtolower(get_class($this));
	}

	protected function render ()
	{
		if (file_exists(APPPATH . '../assets/js/' . $this->controller_name . '.js'))
		{
			$this->javascript[] = $this->controller_name . '.js';
		}
		
		$this->javascript[] = 'core.js';
		
		$view_path = $this->controller_name . '/' . $this->action_name . '.php'; //set the path of the view
		if (file_exists(APPPATH . 'views/' . $view_path)) 
		{
			$toBody["content_body"] = $this->load->view($view_path, $this->data, TRUE);  //load the view
		}
		
		$toTopBar = array();
		// top bar menu
		if ($this->has_nav_top_bar)
		{
			$toTopBar["nav"] = $this->load->view("template/nav_top_bar", '', TRUE);
		}		
		
		$toBody["top_bar"] = $this->load->view("template/top_bar", $toTopBar, TRUE);
		$toBody["footer"] = $this->load->view("template/footer", '', TRUE);

		// static
		$toTpl["controller_name"] = $this->controller_name;
		$toTpl["action_name"] = $this->action_name;
		$toTpl["javascript"] = $this->javascript;
		$toTpl["css"] = $this->css;
		$toTpl["fonts"] = $this->fonts;
		
		// meta
		$toTpl["title"] = $this->title;
		$toTpl["description"] = $this->description;
		$toTpl["keywords"] = $this->keywords;
		$toTpl["author"] = $this->author;
		
		$toTpl["body"] = $this->load->view("template/" . $this->template, $toBody, TRUE);
		
		// render view
		$this->load->view("template/skeleton", $toTpl);
	}
}