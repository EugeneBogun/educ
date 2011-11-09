<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display_lib
{

//data - массив с переменными, name - начало имени файла вида    
//для незарегистрированых пользователей
public function welcome_page($name,$data)
{
    $CI =& get_instance ();
    $CI->load->view('welcome/header_view',$data);
	$CI->load->view('welcome/pre_content_view');
    $CI->load->view('welcome/'.$name.'_view', $data);
    $CI->load->view('welcome/footer_view');
} 
public function user_page()
{
    $CI =& get_instance ();
	
	$CI->load->view('user/header_view');
	$CI->load->view('user/top_left_view');
	$CI->load->view('user/content_left_view');
	$CI->load->view('user/news_view');
	$CI->load->view('user/file_view');
	$CI->load->view('user/subjects_view');
	$CI->load->view('user/footer_view');
} 

public function timetable_insert_page($data)
{	
	$CI =& get_instance ();
	$CI->load->view('user/header_view');
	$CI->load->view('user/top_left_view');
	$CI->load->view('dispatcher/group_view',$data);
    $CI->load->view('dispatcher/add_user_to_group_view',$data);
	$CI->load->view('dispatcher/add_timetable_view',$data);
	$CI->load->view('dispatcher/footer_view');
}
public function message_page($data,$view)
{ 	
	$CI =& get_instance ();
    $CI->load->view('user/header_view');
	$CI->load->view('user/top_left_view');
	$CI->load->view('message/menu_view');
	$CI->load->view('message/'.$view.'_view',$data);
    $CI->load->view('message/footer_view');
   
}
public function values_add_page()
{	
	$CI =& get_instance ();
	$CI->load->view('user/header_view');
	$CI->load->view('user/top_left_view');
    $CI->load->view('values/menu_view');
	$CI->load->view('values/add_values_view');
	$CI->load->view('values/footer_view');
}
public function values_read_page()
{	
	$CI =& get_instance ();
	$CI->load->view('user/header_view');
	$CI->load->view('user/top_left_view');
	$CI->load->view('values/read_values_view');
	$CI->load->view('values/footer_view');
}

}
?>