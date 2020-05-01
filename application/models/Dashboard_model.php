<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	
    function getUserInfo($UserId)
    {
        $this->db->select('tbl_users.*','tbl_role.role');
        $this->db->from('tbl_users');
		$this->db->join('tbl_role','tbl_users.role=tbl_role.role_id');
        $this->db->where('tbl_users.is_deleted', 0);		
        $this->db->where('tbl_users.id', $UserId);
        $query = $this->db->get();      
        return $query->result_array();
    } 
    function UpdatePassword($UserId,$PrevPassword,$NewPassword)
    {
		$this->load->library("encrypt");
        $this->db->select('BaseTbl.username, BaseTbl.password,BaseTbl.id,');
        $this->db->from('tbl_users as BaseTbl');        
        $this->db->where('BaseTbl.id', $UserId);
        $this->db->where('BaseTbl.is_deleted', 0);
        $query = $this->db->get(); 			
        $user = $query->result();
		//return $this->db->last_query() ;
		//return $user ;
        
        if(!empty($user)){
            if(verifyHashedPassword($PrevPassword, $user[0]->password)){ 
				//Update Password
				$loginpassword = password_hash($NewPassword, PASSWORD_DEFAULT); 
				$data = array('tbl_users.password' => $loginpassword);
				$this->db->where('id', $UserId);
				$this->db->update('tbl_users', $data);	
				$action="UPDATE";
				$querytoaudittrail= $this->db->last_query();
			$this->audittrail($querytoaudittrail,$action);
				return 1;		
                
            } else {
				//Incorrect Previous Password Password
                return 2;
            }
        } else {
            return 3;
        }
    }
    function update_Profile($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_users', $data);       
        $affected=$this->db->affected_rows();
        $action="UPDATE";
         $querytoaudittrail= $this->db->last_query();
        $this->audittrail($querytoaudittrail,$action);
        return $affected;
        
    }
    function audittrail($querytoaudittrail,$action)
	{
		$insert = $this->db->insert('tbl_audittrail', array(
		'userid'=>$this->session->userdata('username'),
		'transactiondate'=> date('Y-m-d H:i:s'),
		'querystring'=>$querytoaudittrail,
		'action'=>$action));
		return $insert;	
	}
}
