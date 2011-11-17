<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class subdepartament extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
	  $this->load->model('profile_model');
    }    
    
    public function index($id)
    {	
		$data = array();
		$data= $this->profile_model->get_nav_info($id, 'subdepartament');
		$data= array_merge($data,$this->profile_model->get_subdepartament_info($id));
		$this->display_lib->main_page('subdepartament',$data);
    }
    
}   
    
?>