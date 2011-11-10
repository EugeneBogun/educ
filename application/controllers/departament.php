<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class departament extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
	  $this->load->model('profile_model');
    }    
    
    public function index($id)
    {	
		$data= $this->profile_model->get_nav_info($id, 'departament');
		$data= array_merge($data,$this->profile_model->get_departament_info($id));
		$this->display_lib->main_page('departament',array());
    }
}   
    
?>