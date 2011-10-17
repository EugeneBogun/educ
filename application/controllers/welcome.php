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
    
    public function reg()
    {
		$data->title =  'Регистрация EduUnit'; 	
		$view = 'reg';
		$this->form_validation->set_rules($this->Welcome_model->login_rules);
		if ($this->form_validation->run() == TRUE)
		{
			$key = $this->input->post('key', TRUE);
			$invite=$this->db->query( "SELECT * FROM Invaites WHERE invate = '".$key."'")->result_array();
			if($invite[0]['Users_id']!=NULL)
			{
			$view = 'profile';
			}
		}
		$this->display_lib->welcome_page($view,$data);     
    }
	    
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
	
	public function login() //отображение формы авторизации
    {
	$data->title = 'Вход';
	$view = 'login';
    $this->display_lib->welcome_page($view ,$data);
    }
    
    
    
    
}   
    
?>