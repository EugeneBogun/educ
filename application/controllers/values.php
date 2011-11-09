<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class values extends CI_Controller
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
    
    public function index($name)
    {
		redirect(base_url());	
    }
    
    public function add()
    {
   	    $this->display_lib->values_add_page();
    }
    public function read()
    {
   	    $this->display_lib->values_read_page();
    }
    
}   
    
?>