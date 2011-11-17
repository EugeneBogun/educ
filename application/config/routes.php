<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller']    = "welcome";
$route['user']                  = "user";
$route['logout']                  	= "user/logout";
//invite
$route['ajaxuniverlist']			= "dispatcher/ajaxuniverlist";
$route['ajaxcategorylist']			= "dispatcher/ajaxcategorylist";
$route['ajaxroleslist']				= "dispatcher/ajaxroleslist";
$route['ajaxinviteslist']			= "dispatcher/ajaxinviteslist";
//расписание
$route['ajaxtimetable']         = "user/ajaxtimetable";
$route['ajaxtimetable_subject_curricula']         = "user/ajaxtimetable_subject_curricula";

//группа
$route['univer(:num)']			= "univer/index/$1";
$route['departament(:num)']		= "departament/index/$1";
$route['subdepartament(:num)']	= "subdepartament/index/$1";
$route['group(:num)']			= "group/index/$1";
$route['id(:num)']				= "user/index/$1";
//оценки
//$route['values/(:any)']              = "task/index/$1";
//диспетчерская
$route['ajaxusergroup']              = "dispatcher/ajaxusergroup";
$route['ajaxusernogroup']            = "dispatcher/ajaxusernogroup";
$route['ajaxinsertusergroupresult']  = "dispatcher/ajaxinsertusergroupresult";
$route['ajaxuniverteachplan']        = "dispatcher/ajaxuniverteachplan";
$route['ajaxcurriculagrouplist']     = "dispatcher/ajaxcurriculagrouplist";
$route['ajaxsubjectlist']            = "dispatcher/ajaxsubjectlist";
$route['ajaxfreeclassroomslist']     = "dispatcher/ajaxfreeclassroomslist";
$route['ajaxaddtimetable']           = "dispatcher/ajaxaddtimetable";
$route['ajaxteacherlist']            = "dispatcher/ajaxteacherlist";

//расписание

$route['reg']                   = "welcome/reg";
$route['welcome']				= "welcome/welcome";
$route['about']					= "welcome/about";
$route['login']					= "welcome/login";
$route['send/(:num)']                  = "message/send/$1";
$route['outbox']                = "message/posted";
$route['inbox']               = "message/adopted";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */