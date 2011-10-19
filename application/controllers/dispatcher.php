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
}   
    
?>