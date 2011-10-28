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
		var_dump($_POST);
		/*var_dump($to);
		var_dump($text);*/
		$from = 0;
		$insert_db = array(
        'Users_id_from' => $from,
		'text' => $text,
		'Users_id_to' => $to,
		);
		
		$this->db->insert('Messages',$insert_db);
		
        $this->display_lib->message_page(array(),'send');
    } 
	
	public function posted()
    {
		$from = 0;
		$data['messages']=$this->db->where('Users_id_from',$from)->get('Messages')->result_array();
		
		$this->display_lib->message_page($data,'posted');  /*   */
        
    } 
	
	public function adopted()
    {
		$to = 2;
		$data['messages']=$this->db->where('Users_id_to',$to)->get('Messages')->result_array();
		
		$this->display_lib->message_page($data,'adopted');  /*   */
        
    } 
    
}   
    
?>