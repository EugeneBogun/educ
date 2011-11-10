<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile_model extends CI_Model
{   
    function _construct()
    {
          parent::_construct();
    }
    
    public function get_group_info($id)
    {
		$data['info'] = $this->db->where('id',$id)->get('Groups')->result_array();
		$users_id = $this->db->where('Groups_id',$id)->get('UsersGroups')->result_array();
		$users = array();
		$i = 0;
		foreach($users_id as $user_id)
		{
			$tmp = $this->db->where('id',$user_id['Users_id'])->get('Users')->result_array();
			$users[$i] = array_merge($users,$tmp[0]);
			$role = $this->db->where('id',$user_id['Roles_id'])->get('Roles')->result_array();
			$users[$i]['role'] = $role[0]['name'];
			$i++;
			
		}
		$data['users'] = $users;
		return $data;
    }
	public function get_nav_info($id,$type)
	{
	$data = array();
	switch ($type)
	{
	/*	case 'group': {
			 $group = $this->db->where('id',$id)->get('Groups')->result_array(); 
			 $curricula = $this->db->where('id',$group[0]['Curricula_id'])->get('Curricula')->result_array(); 
			 $dep_spec = $this->db->where('id',$curricula[0]['Dep_Spec_id'])->get('Dep_Spec')->result_array(); 
			 $Departament = $this->db->where('id',$dep_spec[0]['Departments_id'])->get('Departments')->result_array(); 
			 $Univer = $this->db->where('id',$Departament[0]['Universities_id'])->get('Universities')->result_array();
			 $data['departament'] = $Departament[0]['name'];
			 $data['univer'] = $Univer[0]['name'];
			 $data['group'] = $group[0]['name'];
		}
		case 'user': {
			 $user = $this->db->where('id',$id)->get('Users')->result_array(); 
			 $usergroup = $this->db->where('Users_id',$user['id'])->get('Users')->result_array(); 
			 $group = $this->db->where('id', $usergroup['Groups_id'])->get('Groups')->result_array(); 
			 $curricula = $this->db->where('id',$group[0]['Curricula_id'])->get('Curricula')->result_array(); 
			 $dep_spec = $this->db->where('id',$curricula[0]['Dep_Spec_id'])->get('Dep_Spec')->result_array(); 
			 $Departament = $this->db->where('id',$dep_spec[0]['Departments_id'])->get('Departments')->result_array(); 
			 $Univer = $this->db->where('id',$Departament[0]['Universities_id'])->get('Universities')->result_array();
			 $data['departament'] = $Departament[0]['name'];
			 $data['univer'] = $Univer[0]['name'];
			 $data['group'] = $group[0]['name'];
		};*/
	}
	return $data;
	}
	/*public function runway($id)
	{
		$data=$this->db->query( "SELECT * FROM Invites WHERE Users_id = '".$id."'")->result_array();
		$options=explode(";",$data[0]['option']);
		foreach($options as $row)
		{
			$atom = explode(":",$row);
				switch($atom[0])
				{	
					case 'U': 	
						$data->id=$this->db->where('Users_id',$id)->get('UsersUniversities')->result_array();
						$name=$this->db->where('id',$data->id)->get('Universities')->result_array();
						$data->name=$name[0]['name'];
						break;
					case 'D': 
						$ins=array(
							'Departments_id'=>$atom[1],
							'Roles_id'=>$atom[2],
							'Users_id'=>$id);
						$this->db->insert('UsersDepartments',$ins);
						break;
					case 'S': 
						$ins=array(
							'SubDepartments_id'=>$atom[1],
							'Roles_id'=>$atom[2],
							'Users_id'=>$id);
						$this->db->insert('UsersSubDepartments',$ins);
						break;
					case 'G': 
						$ins=array(
							'Groups_id'=>$atom[1],
							'Roles_id'=>$atom[2],
							'Users_id'=>$id);
						$this->db->insert('UsersGroups',$ins);
						break;
				}
		}
	}*/
}