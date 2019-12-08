<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('esmus'));
		$this->load->model('App_model', 'app');
		$this->load->helper('db');
	}
	
	public function about()
	{
		$this->esmus->content('about', [
				'main_title' => $this->lang->line('esmus_toolbar_about'),
				'content'	 => $this->app->settingsInformation($this->uri->segment(1), 'about'),
														 ],$this->config->item('default_theme')); 
	}		
	
	public function contacts()
	{
		$this->esmus->content('contacts', [
				'main_title' => $this->lang->line('esmus_toolbar_contacts'),
				'content'	 => $this->app->settingsInformation($this->uri->segment(1), 'contacts'),
														 ],$this->config->item('default_theme')); 
	}			
}