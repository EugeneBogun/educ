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
     $week = 1;
	 $this->display_lib->user_page();
    }
    
     public function ajaxtimetable()
    {
       	 $id = 7;
         $week = 1;
	 $data['lessons'] = array();
	 $this->load->model('timetable_model');
	 $timetable = $this->timetable_model->timetable($id,$week);
     $this->timetable_model->get_view_timetable($timetable);
    }
    
}   
    
?>