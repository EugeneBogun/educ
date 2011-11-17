<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
	  $this->load->model('profile_model');
    }    
    
   public function index($id)
    {
		$sesion_id = $this->session->userdata('id');
		if(isset($sesion_id)and($sesion_id!=NULL))
			{
			$week = 1;
		    $data=$this->profile_model->get_nav_info($id, 'user');
			$data= array_merge($data,$this->profile_model->get_user_info($id));	
			$this->display_lib->main_page('user',$data);
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
	 $id = $_REQUEST['id_'];
	 $week = 2;
	 $this->load->model('timetable_model');
	 $data['timetable'] = $this->timetable_model->timetable($id,$week);
	 //echo var_dump();
	 $CI =& get_instance ();
	 $CI->load->view('ajax/timetable_view',$data);
    }
	
	public function ajaxtimetable_subject_curricula()
	{
	 $Subjects_Curricula_id = $_REQUEST['Subjects_Curricula_id_'];
	 $week = 2;
	 $this->load->model('timetable_model');
	 $data['timetable'] = $this->timetable_model->timetable_for_subject($Subjects_Curricula_id,$week);
	 $CI =& get_instance ();
	 $CI->load->view('ajax/timetable_prepod_view',$data);
	}
    
}   
    
?>