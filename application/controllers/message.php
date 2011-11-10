<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class message extends CI_Controller
{
	public function __construct()
    {
      parent::__construct();
	  $this->load->model('message_model');
      
    }    
    public function index()
    {
		$to=$this->input->get('to', TRUE);				//кароче это ИД где мы забираем когда идём по ветке message?to=7
		$fio = $this->message_model->get_fio($to);		//переменная которая принимает с масива строку базы данных по айди!!! $to - это ИД
		$data['to'] = $to;								//вбиваем в ассоциотивный массив ИД
		$data['FIO'] = $fio[0]['name'].' '.$fio[0]['surname'];	//Вбиваем в тот же массив Имя и фамилию из базы
		$this->display_lib->message_page($data,'message');	   /*  передайом на страничку вида данные */
	   
        
    } 
	
	public function send($to)     /* забираем с формы данные */ 
    {	
		$text=$this->input->post('text', TRUE);
		$from = $this->session->userdata('id');
		$this->message_model->insert_message($from,$to,$text);	
		var_dump($text);
		//redirect('/inbox');	
    } 
	
	public function posted()  //забираем с сисеии ИД и отдайм его моделе(отправленные)
    {
		
		
		$from= $this->session->userdata('id');
		$data['messages']= $this->message_model->posted_message($from);
		$this->display_lib->message_page($data,'posted'); 
		 /*   */
        
    } 
	
	public function adopted()   //забираем с сисеии ИД и отдайм его моделе (принятые)
    {
		$to = $this->session->userdata('id');
		$data['messages']= $this->message_model->adopted_message($to);
		$this->display_lib->message_page($data,'adopted');
		  /*   */
        
    } 
    
}   
    
?>