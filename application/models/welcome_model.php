<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model
{   
    function _construct()
    {
          parent::_construct();
    }
	public function parser_links($invite)
	{
		$data=$this->db->query( "SELECT * FROM Invites WHERE invite = ".$invite)->result_array();
		$link=explode(";",$data[0]['option']);
		var_dump($link);
		echo "<br>";
		$link=explode(":",$link[0]);
		var_dump($link);
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