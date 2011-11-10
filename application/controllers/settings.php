<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
      $sesion_id = $this->session->userdata('id');
		if(!isset($sesion_id)or($sesion_id==NULL))
        {
			redirect(base_url());
		}
    }    
    
    public function index()
    {
		redirect(base_url());	
    }
    
    public function about()
    {
   	    $this->display_lib->settings_page('about');
    }
    public function invite()
    {
   	    $this->display_lib->settings_page('invite');
    }
    
}   
    
?>