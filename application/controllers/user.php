<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
    }    
    
    public function index($id)
    {
		$sesion_id = $this->session->userdata('id');
		if(isset($sesion_id)and($sesion_id!=NULL))
			{
			$week = 1;
			$this->display_lib->main_page('user',array());
			}
		else
			{
			redirect(base_url());
			}
    }
    
	public function logout()
    {
				$array = array('id'=>'');
				$this->session->unset_userdata($array); 
				redirect(base_url());
	}
    public function task_add()
    {
   	    $this->display_lib->task_add_page();
    }

     public function ajaxtimetable()
    {
       	 $id = 7;
         $week = 1;
	 $this->load->model('timetable_model');
	 $data['timetable'] = $this->timetable_model->timetable($id,$week);
	 
	 $CI =& get_instance ();
	 $CI->load->view('ajax/timetable_view',$data);
    }
    
}   
    
?>