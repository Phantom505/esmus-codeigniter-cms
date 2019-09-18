<?php
/*
*
* İstənilən dəyişəni deaktiv etmək üçün, controller - də
* $this->esmus->(header, sidebar, footer) = false; 
*
*/
class Esmus extends MX_Loader {

    public $header =  'header';
	public $sidebar = 'sidebar';
    public $footer =  'footer';
	
    public function content($views = '', $data = '',$folder = '')
    {
		$this->lang->load('site', $this->uri->segment(1));
        // load header
        if ($this->header)
        {
            $this->load->view('/' . $folder.'/' . $this->header, $data);
        }
		
		// load sidebar
        if ($this->sidebar)
        {
            $this->load->view('/' . $folder . '/'.$this->sidebar, $data);
        }
  
        // load content
        if (is_array($views))
        {
            foreach ($views as $view)
            {
                $this->load->view('/' . $folder . '/' . $view, $data);
            }
        }
        else
        {
            $this->load->view('/' . $folder . '/' . $views, $data);
        }

        // load footer
        if ($this->footer)
        {
            $this->load->view('/' . $folder . '/' . $this->footer);
        }
    }
}