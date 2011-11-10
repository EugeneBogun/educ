<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dispatcher_model extends CI_Model
{   
    function _construct()
    {
          parent::_construct();
    }
    
    public function get_univer_list()
    {
		return $this->db->get('Universities')->result_array();
    }
    
    public function get_group_list()
    {
		return $this->db->get('Groups')->result_array();
    }
    public function get_groupcurricula_list($curricula)
    {
		return $this->db->where('Curricula_id',$curricula)->get('Groups')->result_array();
    }
    public function get_subjectcurriculaterm_list($curricula,$term)
    {
        $i=1;
        $result = array();
   	    $Subjects_Curricula = $this->db->where('curricula_id',$curricula)->where('term',$term)->get('Subjects_Curricula')->result_array();
        foreach ($Subjects_Curricula as $unit)
        {   
            $subject = $this->db->where('id',$unit['Subjects_id'])->get('Subjects')->result_array();
            $result[$i]['fullname'] = $subject[0]['full_name'];
            $result[$i]['id'] = $subject[0]['id'];
            $i++;
        }
        return $result;
    }
    public function get_users_list()
    {
		$data = array();
        $i = 0;
        $users = $this->db->select('id,name, surname,patronymic')->get('Users')->result_array();
        foreach ($users as $row)
        {
            $users_group = null;
            $user_departament = null;
            $user_subdepartament = null;
            
            $users_group = $this->db->where('Users_id',$row['id'])->get('UsersGroups')->result_array();
            $user_departament = $this->db->where('Users_id',$row['id'])->get('UsersDepartments')->result_array();
            $user_subdepartament = $this->db->where('Users_id',$row['id'])->get('UsersSubDepartments')->result_array();
            if ((isset($users_group[0])) OR (isset($user_departament[0])) OR (isset($user_subdepartament[0]))){
                continue;}
            $data[$i]['id'] = $row['id'];
            $data[$i]['fio'] = $row['surname'].' '.substr($row['name'],0,1).'. ';
                if ($row['patronymic']) {$data[$i]['fio'] .= substr($row['patronymic'], 0, 1).'.';}
            $i++;
            
        }
        return $data;
    }
    
     public function get_roles_list()
    {
         return $this->db->where_in('id',array(1,4,5,6))->get('Roles')->result_array();
    }
    
    public function get_subject_teacher_list($curricula_id)
    {
         $UsersSubjectsCurricula =$this->db->get('UsersSubjectsCurricula')->result_array();
         $i=0;
         foreach($UsersSubjectsCurricula as $row)
         {
            $name = $this->get_teacher_name($row['Users_id']);
            $subject_id =  $this->get_subjectcurricula($row['Subjects_Curricula_id'],$curricula_id);
            $subject  =  $this->get_subject($subject_id);
            $return[$i]['name'] = $subject.' - '.$name;
            $return[$i]['id'] = $row['Subjects_Curricula_id'];
            $i++;
         }
         return $return;
         
    }
    //вывод состава группы 
    public function ajaxusergroup($group)
    {
        $data = array();
   	    $user_group = $this->db->where('Groups_id',$group)->get('UsersGroups')->result_array();
        $i = 0;
        foreach ($user_group as $row)
        {
            $user = $this->db->select('name, surname, patronymic')->where('id',$row['Users_id'])->get('Users')->result_array();
            
            $data[$i]['fio'] = $user[0]['surname'].' '.substr($user[0]['name'],0,1).'. ';
			
            if ($user[0]['patronymic'] != NULL) 
            {$data[$i]['fio'] .= substr($user[0]['patronymic'], 0, 1).'.';}
            $role = $this->db->select('name')->where('id',$row['Roles_id'])->get('Roles')->result_array();
            $data[$i]['role'] = $role[0]['name'];
            $i++;
        }
        return $data;
    }
    //кнопка добавить юзера в группу
    public function ajaxinsertusergroupresult($id_user,$id_group,$id_role)
    {
        $is_User_Group =$this->db->where('Users_id',$id_user)->where('Groups_id',$id_group)->get('UsersGroups')->result_array();
        if (isset($is_User_Group[0])) return FALSE;
       
        if (($id_user == 0) or ($id_group == 0) or ($id_role == 0)) return FALSE;
        $insert_db = array(
        'Groups_id' => $id_group,
        'Users_id' => $id_user,
        'Roles_id' => $id_role,
        'description ' => 'вручную'
        );
        $this->db->insert('UsersGroups', $insert_db);     
        return TRUE;
    }
    //пустые аудитории
    public function get_free_classrooms($num,$day,$week,$univer)
	{
	   //список корпусов ВУЗА
	   $buildings_univer =$this
       ->db
       ->select('id')
       ->where('Universities_id',$univer)
       ->get('Buildings')
       ->result_array();
       
       $i = 0;
       
       //список аудиторий ВУЗА
       foreach ($buildings_univer as $build)
       {
            $tmp = $this
            ->db
            ->where('Buildings_id',$build['id'])
            ->get('Classrooms')
            ->result_array();
            
            if (empty($tmp)) continue;
            foreach ($tmp as $unit)
            {
                 $classrooms[$i] = $unit;
                 $i++;
            }
       }
       //занятые аудитории
       $timetable = $this
           ->db
           ->where('week',$week)
           ->where('numder',$num)
           ->where('day',$day)
           ->get('Timetable')
           ->result_array();
       
       $i = 0;
       //пустые аудитории
       if (!isset($timetable[0])) return $classrooms;
       foreach ($classrooms as $classroom)
       {
            
            if ($classroom['id'] == $timetable[0]['Classrooms_id']) continue;
            $classrooms_id[$i] = $classroom['id'];
            $i++;
       }
		return $classrooms_id;
	}
    
    	
	private function get_teacher_name($id)
	{
		$User = $this->db->query('SELECT name,patronymic,surname FROM  Users WHERE id='.$id)->result_array();
		$fio = $User[0]['surname'].' '.substr($User[0]['name'], 0, 1).'. '.substr($User[0]['patronymic'], 0, 1).'.';
		return $fio;
	}
    private function get_subjectcurricula($id,$curricula_id)
	{
	   $subject_id = $this->db->select('Subjects_id')->where('id',$id)->where('curricula_id',$curricula_id)->get('Subjects_Curricula')->result_array();
       return $subject_id[0]['Subjects_id'];
   	}
    private function get_subject($id)
	{
	   $Subject = $this->db->select('name')->where('id',$id)->get('Subjects')->result_array();
	   return $Subject[0]['name'];
   	}
    public function get_teach_plan_list($univer)
    {   
        
        $Curricula = array();   
        $Departments = $this->db->where('Universities_id',$univer)->get('Departments')->result_array();
        foreach($Departments as $Departament)
        {
            $Dep_Spec = $this->db->where('Departments_id',$Departament['id'])->get('Dep_Spec')->result_array();
            foreach($Dep_Spec  as $Dep_Spec_unit)
            {
                $Curricula = array_merge($Curricula, $this->db->where('Dep_Spec_id',$Dep_Spec_unit['id'])->get('Curricula')->result_array());
            }
        }
        return $Curricula;
    }
    
    public function get_group_info($id)
    {
         return $this->db->where('id',$id)->get('Groups')->result_array();
    }
    
    public function get_term($id)
    {      
        $group_info = $this->dispatcher_model->get_group_info($id);
        $this->load->helper('date');
        
          $year_now = mdate('%Y', time());
          $month_now = mdate('%m', time());
          if (!isset($group_info[0])) return;
          
          $year_tech = $year_now-$group_info[0]['YearCreate']; 
          
          switch ($year_tech)
            {   //1 курс
                case 0: $semestr = 1; break; //осень
                case 1: 
                        if ($month_now < 7) {$semestr = 2;}//весна
                        //2 курс
                        if ($month_now > 8) {$semestr = 3;}//осень
                        break;
                case 2:
                        if ($month_now < 7) {$semestr = 4;}//весна
                        //3 курс
                        if ($month_now > 8) {$semestr = 5;}//осень
                        break;
                case 3:
                        if ($month_now < 7) {$semestr = 5;}//весна
                        //4 курс
                        if ($month_now > 8) {$semestr = 6;}//осень
                        break;
                case 4:
                        if ($month_now < 7) {$semestr = 7;}//весна
                        //5 курс
                        if ($month_now > 8) {$semestr = 8;}//осень
                        break;
                case 5:
                        if ($month_now < 7) {$semestr = 9;}
                        //6 курс
                        if ($month_now > 8) {$semestr = 10;}
                        break;
                default: $semestr = 0;
            }
            if ($group_info[0]['type'] == 0) {$semestr -= 2;}
          return $semestr; 
    }
    public function get_freeteacher($subject,$curricula)
    {
        $subject_curricula_id = $this->db
        ->select('id')
        ->where('curricula_id',$curricula)
        ->where('Subjects_id',$subject)
        ->get('Subjects_Curricula')->result_array();
        $i = 0;
        
        
         $UsersSubjectsCurricula = $this->db
            ->where('Subjects_Curricula_id',$subject_curricula_id[0]['id'])
            ->get('UsersSubjectsCurricula')
            ->result_array();
          $Users = array();
          
        foreach ($UsersSubjectsCurricula as $unit)
        {            
            $User = $this->db
            ->where('id',$unit['Users_id'])
            ->get('Users')
            ->result_array();
            $Users[$i]['id'] = $unit['id'];  
            $Users[$i]['surname'] = $User[0]['surname'];
            $i++;
           
        }
       return $Users;  
    }
	//invite
	public function get_univerroles_list($id)
	{
		return $this->db->where('Universities_id',$id)->get('UniversitiesRoles')->result_array();
	}
	public function get_department_list($id)
    {
		return $this->db->where('Universities_id',$id)->get('Departments')->result_array();
    }
	public function get_subdepartments_list($id)
    {
		return $this->db->where('Departments_id',$id)->get('SubDepartments')->result_array();
    }
	public function get_Dep_Spec_list($id)
	{
		$array =array();
		return($this->db->where('Departments_id',$id)->get('Dep_Spec')->result_array());
	}
	
	public function get_Curricula_list($id)
	{
		return($this->db->where('Dep_Spec_id',$id)->get('Curricula')->result_array());
	}
	
	public function get_Curriculatogroup_list($id)
	{
		return($this->db->where('Curricula_id',$id)->get('Groups')->result_array());
	}//invite
}