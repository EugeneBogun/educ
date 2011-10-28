<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dispatcher extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
	  $this->load->model('dispatcher_model');
      $this->load->model('timetable_model');
    }    
    
    public function index()
    {
     $data = array();
     $univer = 1;
     $data['univer_list'] = $this->dispatcher_model->get_univer_list();
     $data['group_list'] = $this->dispatcher_model->get_group_list();
     $data['users_list'] = $this->dispatcher_model->get_users_list();
     $data['roles_list'] = $this->dispatcher_model->get_roles_list();
     $curricula_id = 1;

     $this->display_lib->timetable_insert_page($data);
    }
    
    public function ajaxusergroup()
    {
       $users_list = $this->dispatcher_model->ajaxusergroup($_REQUEST['group']);
       foreach ($users_list as $user)
       {
        echo $user['role'].' '.$user['fio'].'<br/>';
       }
    }
    
    public function ajaxusernogroup()
    {
      $users_list = $this->dispatcher_model->get_users_list();            
            foreach ($users_list as $user) {  echo '
            <option value="'.$user['id'].'">'.$user['fio'].'</option>';}
    }
    
    public function ajaxinsertusergroupresult()
    {
        
        if ($this->dispatcher_model->ajaxinsertusergroupresult($_REQUEST['user'], $_REQUEST['group'],$_REQUEST['role']))
        {
            echo 'Добавлено';
        }
        else
        {
            echo 'Введите данные';
        }
    }
    
    public function ajaxuniverteachplan()
    {   
        $teach_plan_list = $this->dispatcher_model->get_teach_plan_list($_REQUEST['univer']);  
          
        foreach ($teach_plan_list as $unit) {  echo '
            <option value="'.$unit['id'].'">'.$unit['name'].' '.$unit['year_start'].'-'.$unit['year_end'].'</option>';}
    }
    
    public function ajaxcurriculagrouplist()
    {      
        $group_list = $this->dispatcher_model->get_groupcurricula_list($_REQUEST['curricula']);  
        foreach ($group_list as $unit) {  echo '
            <option value="'.$unit['id'].'">'.$unit['name'].'</option>';}
    }
    
    
    public function ajaxsubjectlist()
    {
        $group_id     = $_REQUEST['group'];
        $curricula_id = $_REQUEST['curricula']; 
        $term = $this->dispatcher_model->get_term($group_id); //семестр группы
        $subject_list = $this->dispatcher_model->get_subjectcurriculaterm_list($curricula_id,$term); //предметы группы в этом семестре
         foreach ($subject_list as $unit) {
            
              echo '
           <option value="'.$unit['id'].'">'.$unit['fullname'].'</option>';}
    }
    
    public function ajaxfreeclassroomslist()
    {
        //var_dump($_REQUEST);
        $num  = $_REQUEST['num'];
        $day  = $_REQUEST['day'];
        $week = $_REQUEST['week'];
        $univer = $_REQUEST['univer'];
        $classrooms = $this->dispatcher_model->get_free_classrooms($num,$day,$week,$univer);
        if (!isset($classrooms[0])) return;
        foreach ($classrooms as $classroom)
        {
             echo '
           <option value="'.$classroom['id'].'">'.$this->timetable_model->get_classroom_name($classroom['id'],$univer).'</option>';}
        
        
    }
}   
    
?>