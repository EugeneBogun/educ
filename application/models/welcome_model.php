<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model
{   
    function _construct()
    {
          parent::_construct();
    }
	public function parser_links($invite,$id)
	{
		$data=$this->db->query( "SELECT * FROM Invites WHERE invite = '".$invite."'")->result_array();
		$options=explode(";",$data[0]['option']);
		foreach($options as $row)
		{
			$atom = explode(":",$row);
				switch($atom[0])
				{	
					case 'U': 
						$ins=array(
							'Universities_id'=>$atom[1],
							'Roles_id'=>$atom[2],
							'Users_id'=>$id);
						$this->db->insert('UsersUniversities',$ins);
						break;
					case 'D': 
						$ins=array(
							'Departments_id'=>$atom[1],
							'Roles_id'=>$atom[2],
							'Users_id'=>$id);
						$this->db->insert('UsersDepartments',$ins);
						break;
					case 'S': break;
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
	}
	public $reg_rules = array
		(
                array
                (
                    'field' => 'mail',
                    'label' => 'E-Mail',
                    'rules' => 'trim|required|valid_email|xss_clean|max_length[45]|callback_reg_mail'
                ),
                array
                (
                    'field' => 'passw',
                    'label' => 'Пароль',
                    'rules' => 'trim|required|xss_clean|max_length[20]'
                ),
                array
                (
                    'field' => 'key',
                    'label' => 'Ключ',
                    'rules' => 'trim|required|xss_clean|max_length[20]|callback_key'
                )   
            );
	public $login_rules = array
		(
                array
                (
                    'field' => 'mail',
                    'label' => 'E-Mail',
                    'rules' => 'trim|required|valid_email|xss_clean|max_length[45]|callback_log_mail'
                ),
                array
                (
                    'field' => 'passw',
                    'label' => 'Пароль',
                    'rules' => 'trim|required|xss_clean|max_length[20]|callback_passw'
                ) 
            );
}