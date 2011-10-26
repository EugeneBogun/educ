<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class message extends CI_Controller
{
    public function index()
    {
	
       $this->display_lib->message_page(array(),'message');  /*   */
        
    } 
    public function send()     /* зАБИВАЕМ В БАЗУ ерунду всякую с сообщения */ 
    {	
	
		$to=$this->input->post('to', TRUE);
		$text=$this->input->post('text', TRUE);
		/*var_dump($to);
		var_dump($text);*/
		
		$insert_db = array(
        'Users_id_from' => '0',
		'text' => $text,
		'Users_id_to' => $to,
		);
		
		$this->db->insert('Messages',$insert_db);
		
        $this->display_lib->message_page(array(),'send');
    } 
	
	public function posted()
    {
		
		$data['messages']=$this->db->where('Users_id_from',0)->get('Messages')->result_array();
		
		$this->display_lib->message_page($data,'posted');  /*   */
        
    } 
	
	public function adopted()
    {
		
		$data['messages']=$this->db->where('Users_id_to',2)->get('Messages')->result_array();
		
		$this->display_lib->message_page($data,'adopted');  /*   */
        
    } 
    
}   
    
?>