<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class message_model extends CI_Model
{   
    public function insert_message($from,$to,$text)   //обрабатуем данные формы и забиваем в базу
	{
		$insert_db = array(
        'Users_id_from' => $from,
		'text' => $text,
		'Users_id_to' => $to,
		);
		
		$this->db->insert('Messages',$insert_db);
		
	}
	
	public function posted_message($from)   //забираем из базы отправленные сообщения
		{
			$data = array();
			$messages=$this->db->where('Users_id_from',$from)->get('Messages')->result_array();
			$i=0;
			foreach($messages as $message)
			{
			$fio=$this->db->where('id',$message['Users_id_to'])->get('Users')->result_array();
			$messages[$i]['fio']=$fio[0]['name'].' '.$fio[0]['surname'];			
			$i++;			
			}
			return $messages;
		}
		
	public function adopted_message($to)  //забираем из базы принятые сообщения
		{
$data = array();
			$messages=$this->db->where('Users_id_to',$to)->get('Messages')->result_array();
			$i=0;
			foreach($messages as $message)
			{
			$fio=$this->db->where('id',$message['Users_id_from'])->get('Users')->result_array();
			$messages[$i]['fio']=$fio[0]['name'].' '.$fio[0]['surname'];			
			$i++;			
			}
			return $messages;
		}	

	public function get_fio($id)				//берём имя и фамилию с базы
		{
				return $this->db->where('id',$id)->get('Users')->result_array();
		}
	
}