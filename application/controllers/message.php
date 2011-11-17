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
		$to=$this->input->get('to', TRUE);				//������ ��� �� ��� �� �������� ����� ��� �� ����� message?to=7
		$fio = $this->message_model->get_fio($to);		//���������� ������� ��������� � ������ ������ ���� ������ �� ����!!! $to - ��� ��
		$data['to'] = $to;								//������� � ������������� ������ ��
		$data['FIO'] = $fio[0]['name'].' '.$fio[0]['surname'];	//������� � ��� �� ������ ��� � ������� �� ����
		$this->display_lib->message_page($data,'message');	   /*  ��������� �� ��������� ���� ������ */
	   
        
    } 
	
	public function send($to)     /* �������� � ����� ������ */ 
    {	
	 
		$text=$this->input->get('text', TRUE);
		$from = $this->session->userdata('id');
		$this->message_model->insert_message($from,$to,$text);	
		redirect('/inbox');	
    } 
	
	public function posted()  //�������� � ������ �� � ������ ��� ������(������������)
    {
		
		
		$from= $this->session->userdata('id');
		//$data['messages']= $this->message_model->posted_message($from);
		$data['messages']= $this->message_model->posted_message($from);
		$this->display_lib->message_page($data,'posted'); 
		 /*   */
        
    } 
	
	public function adopted()   //�������� � ������ �� � ������ ��� ������ (��������)
    {
		$to = $this->session->userdata('id');
		$data['messages']= $this->message_model->adopted_message($to);
		$this->display_lib->message_page($data,'adopted');
		  /*   */
        
    } 
    
}   
    
?>