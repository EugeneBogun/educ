<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
    }    
    
    public function index()
    {
	 $id = 7;
	 $data['lessons'] = array();
	 $this->load->model('timetable_model');
	 $timetable = $this->timetable_model->timetable($id);
	 $data['timetable'] = $this->timetable_model->sort_timetable($timetable);	
	 $this->display_lib->user_page($data);
    }
}   
    
?>