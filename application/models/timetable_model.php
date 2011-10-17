<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class timetable_model extends CI_Model
{   
    function _construct()
    {
          parent::_construct();
    }
    
	public function timetable($id)
	{
		$UserGroups = $this->db->query('SELECT Groups_id FROM  UsersGroups WHERE Users_id='.$id)->result_array();
		
	//	$data['Role'] = $this->get_role_name($UserGroups[0]['Roles_id']);
		//$data['group'] = $this->get_group_name($UserGroups[0]['Groups_id']);
		
		$Timetable_list = $this->db->query('SELECT * FROM  Timetable WHERE Groups_id='.$UserGroups[0]['Groups_id'])->result_array();
		$i = 0;
		$univer = 1;
		foreach ($Timetable_list as $lesson)
         {
			$data[$i] = $this->get_classroom_name($lesson['Classrooms_id'],$univer);
			$data[$i]['number'] = $Timetable_list[$i]['numder'];
			$data[$i]['day'] = $this->get_day_name($lesson['nameday']);
			$data[$i]['week'] = $this->get_week_name($lesson['nameweek']);
			$data[$i]['subject'] = $this->get_subject($lesson['UsersSubjectsCurricula_id']);
			$i++;
		 }
		return $data;
	}
    
    function sort_timetable($timetable)
    {
        foreach ($timetable as $row)
				 {
			         IF (($row['week'] == 'Числитель') AND ($row['number'] == 1) AND ($row['day'] == 'Понедельник'))
    				 {
    				  $data[1][1][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[1][1][2] = $row['subject']['subject'];		
    				  $data[1][1][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 2) AND ($row['day'] == 'Понедельник'))
    				 {
    				  $data[1][2][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[1][2][2] = $row['subject']['subject'];		
    				  $data[1][2][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 3) AND ($row['day'] == 'Понедельник'))
    				 {
    				  $data[1][3][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[1][3][2] = $row['subject']['subject'];		
    				  $data[1][3][3] = $row['subject']['teacher'];	
    				 }
                     
                     IF (($row['week'] == 'Числитель') AND ($row['number'] == 1) AND ($row['day'] == 'Вторник'))
    				 {
    				  $data[2][1][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[2][1][2] = $row['subject']['subject'];		
    				  $data[2][1][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 2) AND ($row['day'] == 'Вторник'))
    				 {
    				  $data[2][2][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[2][2][2] = $row['subject']['subject'];		
    				  $data[2][2][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 3) AND ($row['day'] == 'Вторник'))
    				 {
    				  $data[2][3][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[2][3][2] = $row['subject']['subject'];		
    				  $data[2][3][3] = $row['subject']['teacher'];	
    				 }
                     
                     IF (($row['week'] == 'Числитель') AND ($row['number'] == 1) AND ($row['day'] == 'Среда'))
    				 {
    				  $data[3][1][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[3][1][2] = $row['subject']['subject'];		
    				  $data[3][1][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 2) AND ($row['day'] == 'Среда'))
    				 {
    				  $data[3][2][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[3][2][2] = $row['subject']['subject'];		
    				  $data[3][2][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 3) AND ($row['day'] == 'Среда'))
    				 {
    				  $data[3][3][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[3][3][2] = $row['subject']['subject'];		
    				  $data[3][3][3] = $row['subject']['teacher'];	
    				 }
                     
                     IF (($row['week'] == 'Числитель') AND ($row['number'] == 1) AND ($row['day'] == 'Четверг'))
    				 {
    				  $data[4][1][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[4][1][2] = $row['subject']['subject'];		
    				  $data[4][1][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 2) AND ($row['day'] == 'Четверг'))
    				 {
    				  $data[4][2][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[4][2][2] = $row['subject']['subject'];		
    				  $data[4][2][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 3) AND ($row['day'] == 'Четверг'))
    				 {
    				  $data[4][3][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[4][3][2] = $row['subject']['subject'];		
    				  $data[4][3][3] = $row['subject']['teacher'];	
    				 }
                     IF (($row['week'] == 'Числитель') AND ($row['number'] == 1) AND ($row['day'] == 'Пятница'))
    				 {
    				  $data[5][1][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[5][1][2] = $row['subject']['subject'];		
    				  $data[5][1][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 2) AND ($row['day'] == 'Пятница'))
    				 {
    				  $data[5][2][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[5][2][2] = $row['subject']['subject'];		
    				  $data[5][2][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 3) AND ($row['day'] == 'Пятница'))
    				 {
    				  $data[5][3][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[5][3][2] = $row['subject']['subject'];		
    				  $data[5][3][3] = $row['subject']['teacher'];	
    				 }
                     IF (($row['week'] == 'Числитель') AND ($row['number'] == 1) AND ($row['day'] == 'Суббота'))
    				 {
    				  $data[6][1][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[6][1][2] = $row['subject']['subject'];		
    				  $data[6][1][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 2) AND ($row['day'] == 'Суббота'))
    				 {
    				  $data[6][2][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[6][2][2] = $row['subject']['subject'];		
    				  $data[6][2][3] = $row['subject']['teacher'];	
    				 }
    				 
    				 IF (($row['week'] == 'Числитель') AND ($row['number'] == 3) AND ($row['day'] == 'Суббота'))
    				 {
    				  $data[6][3][1] = $row['building']; //пн. 1 пара 1 = где 2 = что 3 = кто
    				  $data[6][3][2] = $row['subject']['subject'];		
    				  $data[6][3][3] = $row['subject']['teacher'];	
    				 }
				 }
                 return $data;
    }
	

	
	public function get_subject($id)
	{
		$UsersSubjectsCurricula = $this->db->query('SELECT * FROM UsersSubjectsCurricula WHERE id='.$id)->result_array();
		
		$data['teacher'] = $this->get_teacher_name($UsersSubjectsCurricula[0]['Users_id']);
		$data['teacher_role'] = $this->get_role_name($UsersSubjectsCurricula[0]['Roles_id']);
		$Subjects_Curricula = $this->db->query('SELECT Subjects_id FROM  Subjects_Curricula WHERE id='.$UsersSubjectsCurricula[0]['Subjects_Curricula_id'])->result_array();
		$data['subject'] = $this->get_subject_name($Subjects_Curricula[0]['Subjects_id']);
		return $data;
	}
	
	public function get_subject_name($id)
	{
	
		$Subject = $this->db->query('SELECT name FROM  Subjects WHERE id='.$id)->result_array();
		return $Subject[0]['name'];
	}
	
	public function get_role_name($id)
	{
		$RoleGroup = $this->db->query('SELECT name FROM  Roles WHERE id='.$id)->result_array();
		return $RoleGroup[0]['name'];
	}
	
	public function get_teacher_name($id)
	{
		$User = $this->db->query('SELECT name,fam,surname FROM  Users WHERE id='.$id)->result_array();
		$User = $User[0]['fam'].' '.mb_substr($User[0]['name'], 0, 1).'. '.mb_substr($User[0]['surname'], 0, 1).'.';
		return $User;
	}
	
	public function get_group_name($id)
	{
		$Group = $this->db->query('SELECT name FROM  Groups WHERE id='.$id)->result_array();
		return $Group[0]['name'];
	}
	
	public function get_day_name($id)
	{
		$day = $this->db->query('SELECT name FROM  Nameday WHERE id='.$id)->result_array();
		return $day[0]['name'];
	}
	
	public function get_week_name($id)
	{
		$week = $this->db->query('SELECT name FROM  Nameweek WHERE id='.$id)->result_array();
		return $week[0]['name'];
	}
	
	public function get_classroom_name($id)
	{
		//сам кабинет
		$classroom = $this->db->query('SELECT * FROM  Classrooms WHERE id = '.$id)->result_array();
		//номер корпуса
		$building = $this->db->query('SELECT name FROM  Buildings WHERE id='.$classroom[0]['Buildings_id'])->result_array();//Университет добавить
		$data['building'] = $building[0]['name'].'-'.$classroom[0]['name'];
		//тип кабинета
		$classroomtype = $this->db->query('SELECT * FROM  ClassroomsTypes WHERE id='.$classroom[0]['ClassRoomsTypes_id'])->result_array();
		$data['type'] = $classroomtype[0]['name'];
		return $data;
	}
                
 
 }
?>