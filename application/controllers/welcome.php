<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
	  $this->load->library('form_validation');
	  $this->load->model('Welcome_model');
    }    
    
    public function index()
    {
	
        $this->welcome();
        
    }
	
	public function link()
	{
		$invite="'1'";
		$this->Welcome_model->parser_links($invite);
	}
	//********************************************************************************************************************
    // авторизация пользователя
	public function login() //отображение формы авторизации
    {
	$data->title = 'Вход';
	$view = 'login';
	$this->form_validation->set_rules($this->Welcome_model->login_rules);
	$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>'); 
	//$data->id='500';
	if ($this->form_validation->run() == TRUE)
	{
		$login = $this->input->post('mail', TRUE);
		$users_id=$this->db->query( "SELECT * FROM Users WHERE email = '".$login."'")->result_array();//Рекомендую возвращать из модели
		$id = array(
				'Users_id'=>$users_id[0]['id']
					);
		$data->id=$users_id[0]['id'];
		$view = 'profile';
	}
	else
	{
		$data->login=$this->input->post('mail', TRUE);
	}
    $this->display_lib->welcome_page($view ,$data);
    }
	
	public function log_mail($str)
	{
		$login=$this->db->query( "SELECT * FROM Users WHERE email = '".$str."'")->result_array();
		if(!isset($login[0]))
		{
			$this->form_validation->set_message('log_mail', 'Данный %s не найдено');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function passw($str)
	{
		$log=$this->input->post('mail', TRUE);
		$login=$this->db->query( "SELECT * FROM Users WHERE email = '".$log."'")->result_array();
		if(!(isset($login[0])and($login[0]['password']==$str)))
		{
			$this->form_validation->set_message('passw', 'Неверный %s !');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	//********************************************************************************************************************
    // реестрация пользователя
    public function reg()
    {
    $data->title =  'Регистрация EduUnit'; 	
	$view = 'reg';
	$this->form_validation->set_rules($this->Welcome_model->reg_rules);
	$this->form_validation->set_error_delimiters('<span style="color:red;float:left;">', '</span>'); 
	if ($this->form_validation->run() == TRUE)
	{
		$key = $this->input->post('key', TRUE);
		$login = $this->input->post('mail', TRUE);
		$passw = $this->input->post('passw', TRUE);
		$mas = array(									//Рекомендую возвращать из модели
				'email'=>$login,
				'password'=>$passw
					);
		$this->db->insert('Users',$mas);
		$users_id=$this->db->query( "SELECT * FROM Users WHERE email = '".$login."'")->result_array();//Рекомендую возвращать из модели
		$this->load->helper('date');
		$now = time();
		$id = array(
				'Users_id'=>$users_id[0]['id'],
				'date_reg' => unix_to_human($now, TRUE, 'eu')
					);
		$this->db->update('Invites', $id, "invite = '".$key."'"); 
		$data->id=$users_id[0]['id'];
		$this->Welcome_model->parser_links($data);
		$view = 'profile';
	}
	else
	{
		$data->login=$this->input->post('mail', TRUE);
		$data->key=$this->input->post('key', TRUE);
	}
    $this->display_lib->welcome_page($view,$data);      
	}
	
	public function reg_mail($str)
	{
		$login=$this->db->query( "SELECT * FROM Users WHERE email = '".$str."'")->result_array();
		if(isset($login[0]))
		{
			$this->form_validation->set_message('reg_mail', 'Данный %s уже используется');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function key($str)
	{
		$invite=$this->db->query( "SELECT * FROM Invites WHERE invite = '".$str."'")->result_array();
		if(isset($invite[0])and($invite[0]['Users_id']==NULL))
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('key', 'Данный %s не допустимый');
			return FALSE;
		}
	}
	
	//********************************************************************************************************************    
	public function about()
    {
    $data->title =  'О проекте'; 	
	$view = 'about';
    $this->display_lib->welcome_page($view,$data);      
    }
    
    
    public function welcome() //отображение формы авторизации
    {
	$data->title = 'Welcome';
	$view = 'welcome';
    $this->display_lib->welcome_page($view ,$data);
    }
	
}   
    
?>