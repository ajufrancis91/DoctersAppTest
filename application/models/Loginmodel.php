<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function getadmin($user_name,$password){
		$query = $this->db->query(" select tbl_users.*,tbl_role.role as userrole from tbl_users inner join tbl_role on tbl_users.role=tbl_role.role_id where username = '".$user_name."' ");
		$row = $query->row_array();
		 $user = $query->result();
        // print_r($user);exit;
        if(!empty($user)){
            if(verifyHashedPassword($password, $user[0]->password)){                 
                return $user;
            } else {                
                return array();
            }
        } else {
            return array();
        }
    }




     function getSideMenu()
        {
            $this->db->select('*');
            $this->db->from('tbl_menumaster');
            $this->db->where('isDeleted', 0);
    		$this->db->order_by('parentID');
    		$this->db->order_by('displayorder');
            $query = $this->db->get();

            return $query->result_array();
        }

     function getMenuRights($jobrole)
        {
            $this->db->select('menu_id,rights');
            $this->db->from('tbl_menurights');
            $this->db->where('role_id', $jobrole);
    		$this->db->where('isDeleted', 0);
            $query = $this->db->get();
            return $query->result_array();
        }	
    	
    public function ForgotPassword($email)
     {
            $this->db->select('email');
            $this->db->from('tbl_users');
            $this->db->where('email', $email);
            $query=$this->db->get();
            return $query->row_array();
     }

}
