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
public function main_page($type,$data)
{
    $CI =& get_instance ();
	
	$CI->load->view('kadet/header_view',$data);
	$CI->load->view('kadet/top_left_view',$data);
    $CI->load->view($type.'/tabs_view',$data);
	$CI->load->view($type.'/content_view',$data);
	$CI->load->view($type.'/footer_view',$data);
} 

public function timetable_insert_page($data)
{	
	$CI =& get_instance ();
	$CI->load->view('kadet/header_view');
	$CI->load->view('kadet/top_left_view');
	$CI->load->view('dispatcher/group_view',$data);
    $CI->load->view('dispatcher/add_user_to_group_view',$data);
	$CI->load->view('dispatcher/add_timetable_view',$data);
	$CI->load->view('dispatcher/invite_view',$data);
	$CI->load->view('dispatcher/footer_view');
}
public function message_page($data,$view)
{ 	
	$CI =& get_instance ();
    $CI->load->view('kadet/header_view');
	$CI->load->view('kadet/top_left_view');
	$CI->load->view('message/tabs_view');
	$CI->load->view('message/'.$view.'_view',$data);
    $CI->load->view('message/footer_view');
   
}
public function values_page($view,$data)
{	
	$CI =& get_instance ();
	$CI->load->view('kadet/header_view');
	$CI->load->view('kadet/top_left_view',$data);
	$CI->load->view('values/'.$view.'_view',$data);
	$CI->load->view('values/footer_view');
}
public function settings_page($view)
{	
	$CI =& get_instance ();
	$CI->load->view('kadet/header_view');
	$CI->load->view('kadet/top_left_view');
    $CI->load->view('settings/tabs_view');
	$CI->load->view('settings/'.$view.'_view');
	$CI->load->view('settings/footer_view');
}
public function group_page()
{	
	$CI =& get_instance ();
	$CI->load->view('kadet/header_view');
	$CI->load->view('kadet/top_left_view');
    $CI->load->view('groups/tabs_view');
	$CI->load->view('groups/content_view');
	$CI->load->view('groups/footer_view');
}
}
?>