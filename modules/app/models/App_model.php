<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model
{
	
	protected $ci;
	
	public function __construct()
	{
		parent::__construct();
		$this->ci =& get_instance();
	}


	public function settingsInformation($lang = 'en', $section)
	{
	  return DB::use('default')
            ->select('*')
            ->from('esmus_settings')
            ->where('lang',    $lang)
            ->where('section', $section)
            ->get()
            ->row_array()['content'];
	}
	
}