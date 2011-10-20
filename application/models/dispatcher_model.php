<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dispatcher_model extends CI_Model
{   
    function _construct()
    {
          parent::_construct();
    }
    
    public function get_group_list()
    {
		return $this->db->get('Groups')->result_array();
    }
    public function get_users_list()
    {
		$data = array();
        $i = 0;
        $users = $this->db->select('id, fam, name, surname')->get('Users')->result_array();
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
            $data[$i]['fio'] = $row['fam'].' '.substr($row['name'],0,1).'. ';
                if ($row['surname']) {$data[$i]['fio'] .= substr($row['surname'], 0, 1).'.';}
            $i++;
            
        }
        return $data;
    }
    
    public function get_roles_list()
    {
         return $this->db->where_in('id',array(1,4,5,6))->get('Roles')->result_array();
    }
    //вывод состава группы 
    public function ajaxusergroup($group)
    {
        $data = array();
   	    $user_group = $this->db->where('Groups_id',$group)->get('UsersGroups')->result_array();
        $i = 0;
        foreach ($user_group as $row)
        {
            $user = $this->db->select('fam,name,surname')->where('id',$row['Users_id'])->get('Users')->result_array();
            
            $data[$i]['fio'] = $user[0]['fam'].' '.substr($user[0]['name'],0,1).'. ';
            if ($user[0]['surname']) {$data['users'][$i]['fio'] .= substr($user[0]['surname'], 0, 1).'.';}
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
    
    public function get_classrooms($univer)
	{
		$classrooms = $this->db->order_by('name','ASC')->get('Classrooms')->result_array();
        
        $i = 0;
        foreach($classrooms as $classroom)
        {
            $building = $this->db
            ->where('id',$classroom['Buildings_id'])
            ->where('Universities_id',$univer)
            ->limit(1)
            ->get('Buildings')->result_array();
            
            $data[$i]['id'] = $classroom['id'];
            if ($building[0]['name'] != '')
            {
                $data[$i]['name'] = $building[0]['name'].'-'.$classroom['name'];
            }
            else
            {
                $data[$i]['name'] = $classroom['name'];
            }
            
            $i++;
        }
		return $data;
	}
}