<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dispatcher extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
	  $this->load->model('dispatcher_model');
    }    
    
    public function index()
    {
     $data = array();
     $data['group_list'] = $this->dispatcher_model->get_group_list();
     $data['users_list'] = $this->dispatcher_model->get_users_list();
     $data['roles_list'] = $this->dispatcher_model->get_roles_list();
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
    public function ajaxinsertusergroup()
    {
        if ($this->dispatcher_model->ajaxinsertusergroup($_REQUEST['user'], $_REQUEST['group'],$_REQUEST['role']))
        {
            echo 'Добавлено';
        }
        //var_dump($_REQUEST);
    }
}   
    
?>