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
            $users_group = $this->db->where('Users_id',$row['id'])->get('UsersGroups')->result_array();
            if (isset($users_group[0])) {
                $users_group = null;
                continue;
            }
            $data[$i]['id'] = $row['id'];
            $data[$i]['fio'] = $row['fam'].' '.substr($row['name'],0,1).'. ';
                if ($row['surname']) {$data[$i]['fio'] .= substr($row['surname'], 0, 1).'.';}
            $i++;
            
        }
        return $data;
    }
    
    public function get_roles_list()
    {
         return $this->db->get('Roles')->result_array();
    }
    
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
}