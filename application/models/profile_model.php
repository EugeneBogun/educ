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
	public function get_departament_info($id)
    {
		$data['info'] = $this->db->where('id',$id)->get('Departments')->result_array(); //просто инфо
		$dep_spec = $this->db->where('Departments_id',$id)->get('Dep_Spec')->result_array();//специальности на отделении
		$spec = array();
		$groups= array();
		$Curricula = array();
		$i = 0;
		
		foreach($dep_spec as $spec)//уч.планы на отделении
		{
			$Curricula = array_merge($Curricula,
			$this->db->where('Dep_Spec_id',$spec['id'])->group_by('')->get('Curricula')->result_array());
		}	
		
		foreach($Curricula as $с)//группы на отделении
		{
			$groups = array_merge($groups,$this->db->where('Curricula_id',$с['id'])->get('Groups')->result_array());
		}
		$data['groups'] = $groups;
		return $data;
    }
	public function get_univer_info($id)
    {
		$Univer = $this->db->where('id',$id)->get('Universities')->result_array();
		$Departaments = $this->db->where('Universities_id',$id)->get('Departments')->result_array();//специальности на отделении
		$data['info'] = $Univer;
		$data['departaments'] = $Departaments;
		return $data;
    }
	
	public function get_nav_info($id,$type)
	{
	$data = array();
    
	switch ($type)
	{
		case 'univer': {
			 $Univer = $this->db->where('id',$id)->get('Universities')->result_array();
			 if (!isset($Univer[0])){redirect('/');}
			 $data['univer']['name'] = $Univer[0]['name'];
			 $data['univer']['id'] = $Univer[0]['id'];
             break;   
		}
		case 'departament': {
			 $Departament = $this->db->where('id',$id)->get('Departments')->result_array(); 
			 if (!isset($Departament[0])){redirect('/');}
			 $Univer = $this->db->where('id',$Departament[0]['Universities_id'])->get('Universities')->result_array();
			 $data['departament']['name'] = $Departament[0]['name'];
			 $data['univer']['name'] = $Univer[0]['name'];
             
			 $data['departament']['id'] = $Departament[0]['id'];
			 $data['univer']['id'] = $Univer[0]['id'];
             break;   
		}
        case 'group': {
			 $group = $this->db->where('id',$id)->get('Groups')->result_array(); 
			  if (!isset($group[0])){redirect('/');}
			 $curricula = $this->db->where('id',$group[0]['Curricula_id'])->get('Curricula')->result_array(); 
			 $dep_spec = $this->db->where('id',$curricula[0]['Dep_Spec_id'])->get('Dep_Spec')->result_array(); 
			 $Departament = $this->db->where('id',$dep_spec[0]['Departments_id'])->get('Departments')->result_array(); 
			 $Univer = $this->db->where('id',$Departament[0]['Universities_id'])->get('Universities')->result_array();
			 $data['departament']['name'] = $Departament[0]['name'];
			 $data['univer']['name'] = $Univer[0]['name'];
			 $data['group']['name'] = $group[0]['name'];
             
			 $data['departament']['id'] = $Departament[0]['id'];
			 $data['univer']['id'] = $Univer[0]['id'];
			 $data['group']['id'] = $group[0]['id'];
             break;   
		}
		case 'user': {
		  
			 $user = $this->db->where('id',$id)->get('Users')->result_array(); 
			if (!isset($user[0])){redirect('/');}
			 $usergroup = $this->db->where('Users_id',$user[0]['id'])->get('UsersGroups')->result_array();
			 $usersubdepartments = $this->db->where('Users_id',$user[0]['id'])->get('UsersSubDepartments')->result_array(); 			 
			 //Добавить ЦК, и ссылки на преподов под ЦК. ссылки на состав отделения и состав универа
			if (!isset($usergroup[0])){ redirect('/');}
			switch ($usergroup[0]['Roles_id'])
			{
				case 1:	
				{
				 $group = $this->db->where('id', $usergroup[0]['Groups_id'])->get('Groups')->result_array(); 
				 $curricula = $this->db->where('id',$group[0]['Curricula_id'])->get('Curricula')->result_array(); 
				 $dep_spec = $this->db->where('id',$curricula[0]['Dep_Spec_id'])->get('Dep_Spec')->result_array(); 
				 $Departament = $this->db->where('id',$dep_spec[0]['Departments_id'])->get('Departments')->result_array(); 
				 $Univer = $this->db->where('id',$Departament[0]['Universities_id'])->get('Universities')->result_array();
				 $data['departament']['name'] = $Departament[0]['name'];
				 $data['univer']['name'] = $Univer[0]['name'];
				 $data['group']['name'] = $group[0]['name'];
				 $data['user']['name'] = $user[0]['surname'].' '.$user[0]['name'];
				 
				 $data['departament']['id'] = $Departament[0]['id'];
				 $data['univer']['id'] = $Univer[0]['id'];
				 $data['group']['id'] = $group[0]['id'];
				 $data['user']['id'] = $user[0]['id'];
				 break;   
				 }
			 default:
				{redirect('/');}
			 }
		};
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