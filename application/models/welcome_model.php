<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model
{   
    function _construct()
    {
          parent::_construct();
    }
	public $login_rules = array
		(
                array
                (
                    'field' => 'login',
                    'label' => '�����',
                    'rules' => 'trim|required|xss_clean|max_length[45]'
                ),
                array
                (
                    'field' => 'passw',
                    'label' => '������',
                    'rules' => 'trim|required|xss_clean|max_length[20]'
                ),
                array
                (
                    'field' => 'key',
                    'label' => '����',
                    'rules' => 'trim|required|xss_clean|max_length[20]|callback_checkpassw'
                )   
            );
}