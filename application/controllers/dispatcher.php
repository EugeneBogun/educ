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
     public function ajaxaddtimetable()
     {
        $num  = $_REQUEST['num'];
        $day  = $_REQUEST['day'];
        $week = $_REQUEST['week'];
        $univer = $_REQUEST['univer'];
        $group  = $_REQUEST['group'];
        $curricula  = $_REQUEST['curricula'];
        $classroom = $_REQUEST['classroom'];
        $subject = $_REQUEST['subject'];
        $teacher = $_REQUEST['teacher'];
        switch (0){
            case $num:
            case $day:
            case $week:
            case $univer:
            case $group:
            case $curricula:
            case $classroom:
            case $subject:
            case $teacher:
                    echo '-1';
                    return;
        }
        $ins=array(
        'week'=>$week,
        'day'=>$day,
        'numder' => $num,
        'Groups_id' => $group,
        'Classrooms_id' => $classroom,
        'UsersSubjectsCurricula_id' => $teacher);
        $this->db->insert('Timetable',$ins);
        var_dump($_REQUEST);
     }
      public function ajaxteacherlist()
      {
        $subject = $_REQUEST['subject'];  
        $curricula  = $_REQUEST['curricula'];
        $teachers = $this->dispatcher_model->get_freeteacher($subject,$curricula);
        foreach($teachers as $teacher)
        {
            echo '
           <option value="'.$teacher['id'].'">'.$teacher['surname'].'</option>';
        }
      }
	  //invites	
	  
	public function ajaxinviteslist()
	{
		$invite_list= $this->dispatcher_model->get_invite_list();
		echo('<center> <table border="1" cellspacing="0" bordercolor="#ddd">');
		echo '<tr><td>Инвайт</td><td>Роль</td><td>id Пользователя</td></tr>';
		foreach ($invite_list as $invite) {  echo '<tr><td>'.$invite['invite'].'</td><td>'.$invite['option'].'</td><td>'.$invite['Users_id'].'</td></tr>';}
		echo('</table></center>');
	}
	 
	public function ajaxuniverlist()
    {
		$univer_list = $this->dispatcher_model->get_univer_list();
		echo '<option value="0">Выбирите</option>';
			foreach ($univer_list as $univer) {  echo '
            <option value="'.$univer['id'].'">'.$univer['name'].'</option>';}
    }
	
	public function ajaxroleslist()
	{
	  $id=$_REQUEST['univer_id'];
	  $univerroles_list = $this->dispatcher_model->get_univerroles_list($id);
	  echo '<option value="0">Выбирете</option>';
	  foreach($univerroles_list as $univerroles)
	  {
		$roles = $this->db->where('id',$univerroles['Roles_id'])->get('Roles')->result_array();
		echo('<option value="'.$roles['0']['id'].'">'.$roles['0']['name'].'</option>');
	  }
	}
	
	public function ajaxsaveinvites()
	{
		$optionlist=$_REQUEST['roleslist'];
		$count = $_REQUEST['count'];
		$randominvites_list = $this->dispatcher_model->create_randominvites($count,$optionlist);
		echo('<center> <table border="1" cellspacing="0" id="new_invites">');
		echo('<tr><td>Инвайт</td><td>Роль</td></tr>');
		foreach($randominvites_list as $randominvites)
		{
			echo ('<tr><td>'.$randominvites.'</td><td>'.$optionlist.'</td></tr>');
		}
		echo('</table><div id="print_button">На печать</div></center>');
	}
	
	public function ajaxcategorylist()
    {
	  $category=$_REQUEST['category'];
	  $id=$_REQUEST['id_univer'];
	  switch($category)
		{
			case 'U': 
				break;
			case 'D': 
				$department_list=$this->dispatcher_model->get_department_list($id);
				foreach ($department_list as $department) {  echo '
				<option value="'.$department['id'].'">'.$department['name'].'</option>';}
				break;
			case 'S': 
				$department_list=$this->dispatcher_model->get_department_list($id);
				foreach ($department_list as $department) { 
					$subdepartments_list=$this->dispatcher_model->get_subdepartments_list($department['id']);
					foreach($subdepartments_list as $subdepartments){ echo '
					<option value="'.$subdepartments['id'].'">'.$subdepartments['name'].'</option>';}
				}
				break;
			case 'G': 
				$department_list=$this->dispatcher_model->get_department_list($id);
				foreach ($department_list as $department) { 
					$Dep_Spec_list=$this->dispatcher_model->get_Dep_Spec_list($department['id']);
					foreach($Dep_Spec_list as $Dep_Spec){
						$Curricula_list=$this->dispatcher_model->get_Curricula_list($Dep_Spec['id']);
						foreach($Curricula_list as $Curricula){
							$Curriculatogroup_list=$this->dispatcher_model->get_Curriculatogroup_list($Curricula['id']);
							foreach($Curriculatogroup_list as $Curriculatogroup){echo '
								<option value="'.$Curriculatogroup['id'].'">'.$Curriculatogroup['name'].'</option>';
								}
							}
						}
				}
				break;		
		}
				
	}   
	
//invites
}  
    
?>