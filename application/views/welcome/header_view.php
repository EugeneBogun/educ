<?
$this->load->helper('url');
if ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE') ) 
{
die('<div style="clear:both; background:#ffff99; border:1px solid #cccc66; font-family:Arial, Helvetica, sans-serif; color:#333333; height:150px;" > <div style="display:block; width:90%; margin:10px; padding:0 0 0 80px; background:url(img/warning.gif) no-repeat -10px 0;" > <a href="http://www.google.ru/chrome"  style="display:block; float:right; width:75px; height:98px; background:url(img/chrome.gif);"  title="Установить Google Chrome"></a> <a href="http://www.apple.com/ru/safari/"  style="display:block; float:right; width:75px; height:98px; background:url(img/safari.gif);"  title="Установить Apple Safari"></a><a href="http://www.opera.com/download/get.pl?id=33016&thanks=true&sub=true"  style="display:block; float:right; width:75px; height:98px; background:url(img/opera.gif);"  title="Установить Opera"></a> <a href="http://www.mozilla-europe.org/ru/firefox/"  style="display:block; float:right; width:75px; height:98px; background:url(img/firefox.gif);"  title="Установить Mozilla Firefox"></a> <strong style="font-size:14px; display:block; padding-top:5px; color:#cc3300;" >Внимание!</strong> <p style="font-size:11px; line-height:17px; margin:0;" >Вы пользуетесь устаревшим браузером, подвергая ваш компьютер повышенной опасности.<br />Благодаря "дырам" в данной версии браузера, ваша система может получить "в подарок" вирусы, трояны, порноинформеры, даже если вы не заходите на сайты "сомнительного содержания".<br /> Чтобы использовать все возможности этого сайта и обезопасить свой компьютер, обновите браузер.</p></div> </div>');
//die('Браузер, который вы используете, не может корректно отобразить эту страницу. Пожалуйста, обновите его. <a href="http://enoughie6.com/">Получить больше информации</a>.');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title;?></title>
<link href="/css/welcome.css" rel="stylesheet" type="text/css" />
</head>