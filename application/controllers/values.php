<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class values extends CI_Controller
{
    public $sesion_id = 7;
	
    public function __construct()
    {
      parent::__construct();
	  $this->load->model('values_model');
      
    }    
    
    public function index()
    {
		redirect(base_url());	
    }
    
    public function add()
    {
		$data = array();
   	    $this->display_lib->values_page('add',$data);
    }
	
    public function read()
    {
		$data['values'] = $this->values_model->get_values($this->sesion_id);
		
   	    $this->display_lib->values_page('read',$data);
    }
    
}   
    
?>