<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class timetable_model extends CI_Model
{   
    function _construct()
    {
          parent::_construct();
    }
    
	public function timetable($id,$week)
	{
		$UserGroups = $this->db->query('SELECT Groups_id FROM  UsersGroups WHERE Users_id='.$id)->result_array();
			
		$Timetable_list = $this->db->query('SELECT * FROM  Timetable WHERE Groups_id='.$UserGroups[0]['Groups_id'])->result_array();
		$i = 0;
		$univer = 1;

		foreach ($Timetable_list as $lesson)
         {
            if ($lesson['week'] == $week) 
            {
                $data[$lesson['day']][$lesson['numder']] = $this->get_subject($lesson['UsersSubjectsCurricula_id']);
                $data[$lesson['day']][$lesson['numder']]['classroom'] =  $this->get_classroom_name($lesson['Classrooms_id'],$univer);
            }
            
         }
		return $data;
	}
	
	private function get_subject($id)
	{
	   //кто что преподает
		$UsersSubjectsCurricula = $this->db->select('Subjects_Curricula_id,Users_id,Roles_id')->where('id',$id)->get('UsersSubjectsCurricula')->result_array();
		
		$data['teacher'] = $this->get_teacher_name($UsersSubjectsCurricula[0]['Users_id']);//кто
		$Subjects_Curricula = $this->db->select('Subjects_id')->where('id',$UsersSubjectsCurricula[0]['Subjects_Curricula_id'])->get('Subjects_Curricula')->result_array();
		$data['subject'] = $this->get_subject_name($Subjects_Curricula[0]['Subjects_id']);//что
		return $data;
	}
	
	private function get_subject_name($id)
	{
	
		$Subject = $this->db->query('SELECT name FROM  Subjects WHERE id='.$id)->result_array();
		return $Subject[0]['name'];
	}
	
	private function get_role_name($id)
	{
		$RoleGroup = $this->db->query('SELECT name FROM  Roles WHERE id='.$id)->result_array();
		return $RoleGroup[0]['name'];
	}
	
	private function get_teacher_name($id)
	{
		$User = $this->db->query('SELECT name,patronymic,surname FROM  Users WHERE id='.$id)->result_array();
		$fio = $User[0]['surname'].' '.substr($User[0]['name'], 0, 1).'. '.substr($User[0]['patronymic'], 0, 1).'.';
		return $fio;
	}
	
	private function get_group_name($id)
	{
		$Group = $this->db->query('SELECT name FROM  Groups WHERE id='.$id)->result_array();
		return $Group[0]['name'];
	}
	
	private function get_day_name($id)
	{
        switch ($id)
        {
            case 1: return 'Понедельник';
            case 2: return 'Вторник';
            case 3: return 'Среда';
            case 4: return 'Четверг';
            case 5: return 'Пятница';
            case 6: return 'Суббота';
            case 7: return 'Воскресение';
            default: return 'неизвестный день недели';
        }

	}
	
	private function get_week_name($id)
	{
		switch ($id)
        {
            case 1: return 'Числитель';
            case 2: return 'Знаменатель';
            default: return 'неизвестный тип недели';
        }
	}
	
	public function get_classroom_name($id,$univer)
	{
		//сам кабинет
		$classroom = $this->db->query('SELECT * FROM  Classrooms WHERE id = '.$id)->result_array();
		//номер корпуса
		$building = $this->db->query('SELECT name FROM  Buildings WHERE id='.$classroom[0]['Buildings_id'].' AND Universities_id='.$univer)->result_array();//Университет добавить
        if  ($building[0]['name'] == '') {return $classroom[0]['name'];}
		$return = $building[0]['name'].'-'.$classroom[0]['name'];
		//тип кабинета
		return $return;
	}
         
 
 }
?>