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
		$sesion_id = $this->session->userdata('id');
		if(isset($sesion_id)and($sesion_id!=NULL))
			{
			redirect(base_url()."id".$sesion_id);
			}
		else
			{
			$this->welcome();
			}
    }
	
	public function link()
	{
		$invite ="'654456'";
		$id =326 ;
		$this->Welcome_model->parser_links($invite,$id);
	}
	//********************************************************************************************************************
    // авторизация пользователя
	public function login() //отображение формы авторизации
    {
		$sesion_id = $this->session->userdata('id');
		if(isset($sesion_id)and($sesion_id!=NULL))
			{
			redirect(base_url()."id".$sesion_id);
			}
		else
			{
			$data->title = 'Вход';
			$view = 'login';
			$this->form_validation->set_rules($this->Welcome_model->login_rules);
			$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>'); 
			if ($this->form_validation->run() == TRUE)
				{
				$array['login'] = $this->input->post('mail', TRUE);
				$data->id=$this->Welcome_model->return_data($array);
				$array = array('id'=>$data->id);
				$this->session->set_userdata($array);
				$run = $this->profile_model->runway($id);
				$runway = array(
					'category'=>$run['0'],
					'ctegory_id'=>$run['1'],
					'roles_id'=>$run['2']);
				$this->session->set_userdata($runway);
				redirect(base_url()."id".$data->id);
				}
			else
				{
				$data->login=$this->input->post('mail', TRUE);
				}
		$this->display_lib->welcome_page($view ,$data);
		}	
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
		$sesion_id = $this->session->userdata('id');
		if(isset($sesion_id)and($sesion_id!=NULL))
			{
			redirect(base_url()."id".$sesion_id);
			}
		else
			{
			$data->title =  'Регистрация EduUnit'; 	
			$view = 'reg';
			$this->form_validation->set_rules($this->Welcome_model->reg_rules);
			$this->form_validation->set_error_delimiters('<span style="color:red;float:left;">', '</span>'); 
			if ($this->form_validation->run() == TRUE)
				{
				$array['key']= $this->input->post('key', TRUE);
				$array['login']=$this->input->post('mail', TRUE);
				$array['passw']=$this->input->post('passw', TRUE);
				/*$key = $this->input->post('key', TRUE);
				$login = $this->input->post('mail', TRUE);
				$passw = $this->input->post('passw', TRUE);*/
				$data->id=$this->Welcome_model->return_data($array);
				/*
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
				$this->Welcome_model->parser_links($key,$users_id[0]['id']);//Добавил*/
				
				redirect(base_url()."login");
				}
			else
				{
				$data->login=$this->input->post('mail', TRUE);
				$data->key=$this->input->post('key', TRUE);
				}
			$this->display_lib->welcome_page($view,$data);  
			}     
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
		$sesion_id = $this->session->userdata('id');
		if(isset($sesion_id)and($sesion_id!=NULL))
			{
			redirect(base_url()."id".$sesion_id);
			}
		else
			{
			$data->title =  'О проекте'; 	
			$view = 'about';
			$this->display_lib->welcome_page($view,$data); 
			}     
    }
    
    
    public function welcome() //отображение формы авторизации
    {
	$data->title = 'Welcome';
	$view = 'welcome';
    $this->display_lib->welcome_page($view ,$data);
    }
	
}   
    
?>