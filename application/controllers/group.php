<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class group extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
	  $this->load->model('profile_model');
    }    
    
    public function index($id)
    {
		$data = $this->profile_model->get_group_info($id);
		$data['nav'] = $this->profile_model->get_nav_info($id,'group');
		$this->display_lib->main_page('groups',$data);
		
    }
    
}   
    
?>