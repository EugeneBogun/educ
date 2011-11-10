<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class values_model extends CI_Model
{   
    function _construct()
    {
          parent::_construct();
    }
    
   
    public function get_values($id)
    {
        
         $Values = $this->db
            ->where('Users_id',$id)
            ->get('Values')
            ->result_array();
         /* 
        foreach ($UsersSubjectsCurricula as $unit)
        {            
            $User = $this->db
            ->where('id',$unit['Users_id'])
            ->get('Users')
            ->result_array();
            $Users[$i]['id'] = $unit['id'];  
            $Users[$i]['surname'] = $User[0]['surname'];
            $i++;
           
        }*/
       return $Values;  
    }
}