<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('esmus'));
	}
	
	public function index()
	{
		$this->esmus->content('main', [
				'main_title'   => 'Esmus - CMS based on CodeIgniter',
														 ],$this->config->item('default_theme')); 
	}	
}