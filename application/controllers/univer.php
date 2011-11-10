<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class univer extends CI_Controller
{
    
    public function __construct()
    {
      parent::__construct();
    }    
    
    public function index($id)
    {
		$this->display_lib->main_page('univer',array());
    }
    
}   
    
?>