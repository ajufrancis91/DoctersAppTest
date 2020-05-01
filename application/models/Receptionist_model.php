<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Receptionist_model extends CI_Model
{
    
    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    function selectAllReceptionist()
    {
        $this->db->select('id,username,password,name,email,contact,address,role,active');
        $this->db->from('tbl_users');     
        $this->db->where('tbl_users.is_deleted', 0);
        $this->db->where('tbl_users.role', 2);
        $query = $this->db->get();        
       	return $query->result_array(); 	
    }
	
	
	function selectReceptionistById($recpt_id)
    {
        $this->db->select('id,username,password,name,email,contact,address,role,active');
        $this->db->from('tbl_users');       	
        $this->db->where('id', $recpt_id);
        $this->db->where('role', 2);
        $query = $this->db->get();        
        return $query->result_array();
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
	
	function save_Receptionist($data)
    {
		$insert = $this->db->insert('tbl_users', $data);
        $insert_id = $this->db->insert_id();
		$action="INSERT";
				$querytoaudittrail= $this->db->last_query();
				$this->audittrail($querytoaudittrail,$action);
	    return $insert_id;
	}

   
	
	function update_Receptionist($data)
    {
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_users', $data);       
        $affected=$this->db->affected_rows();
		$action="UPDATE";
		 $querytoaudittrail= $this->db->last_query();
		$this->audittrail($querytoaudittrail,$action);
		return $affected;
		
	}

  
	
	function delete_Receptionist($deleteId, $userInfo)
    {
        $this->db->where('id', $deleteId);
        $this->db->update('tbl_users', $userInfo);
        echo $this->db->last_query();
        $affected=$this->db->affected_rows();
		$action="DELETE";
		$querytoaudittrail= $this->db->last_query();
		$this->audittrail($querytoaudittrail,$action);             
        return $affected;
    }
}
	
?>