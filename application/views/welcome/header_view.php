<?
$this->load->helper('url');
if ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE') ) 
{
die('<div style="clear:both; background:#ffff99; border:1px solid #cccc66; font-family:Arial, Helvetica, sans-serif; color:#333333; height:150px;" > <div style="display:block; width:90%; margin:10px; padding:0 0 0 80px; background:url(img/warning.gif) no-repeat -10px 0;" > <a href="http://www.google.ru/chrome"  style="display:block; float:right; width:75px; height:98px; background:url(img/chrome.gif);"  title="���������� Google Chrome"></a> <a href="http://www.apple.com/ru/safari/"  style="display:block; float:right; width:75px; height:98px; background:url(img/safari.gif);"  title="���������� Apple Safari"></a><a href="http://www.opera.com/download/get.pl?id=33016&thanks=true&sub=true"  style="display:block; float:right; width:75px; height:98px; background:url(img/opera.gif);"  title="���������� Opera"></a> <a href="http://www.mozilla-europe.org/ru/firefox/"  style="display:block; float:right; width:75px; height:98px; background:url(img/firefox.gif);"  title="���������� Mozilla Firefox"></a> <strong style="font-size:14px; display:block; padding-top:5px; color:#cc3300;" >��������!</strong> <p style="font-size:11px; line-height:17px; margin:0;" >�� ����������� ���������� ���������, ��������� ��� ��������� ���������� ���������.<br />��������� "�����" � ������ ������ ��������, ���� ������� ����� �������� "� �������" ������, ������, ��������������, ���� ���� �� �� �������� �� ����� "������������� ����������".<br /> ����� ������������ ��� ����������� ����� ����� � ����������� ���� ���������, �������� �������.</p></div> </div>');
//die('�������, ������� �� �����������, �� ����� ��������� ���������� ��� ��������. ����������, �������� ���. <a href="http://enoughie6.com/">�������� ������ ����������</a>.');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title;?></title>
<link href="/css/welcome.css" rel="stylesheet" type="text/css" />
</head>