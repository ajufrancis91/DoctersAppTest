<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends CI_Model
{
    
    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    function selectrole()
    {
        $this->db->select('tbl_role.role_id,tbl_role.id, tbl_role.role');
        $this->db->from('tbl_role');     
        $this->db->where('tbl_role.isDeleted', 0);
        $query = $this->db->get();
        
       	return $query->result_array(); 	
    }
	 function getCommonParameters($type)
    {
        $this->db->select('prefix,value');
        $this->db->from('tbl_commonparameters');        	
        $this->db->where('type', $type);
        $query = $this->db->get(); 	
        $data['SerialNoInfo'] = $query->result_array();
        $newval=$data['SerialNoInfo'][0]['value']+1;
        $this->db->where('type', $type);
        $this->db->update('tbl_commonparameters', array('value' => $newval));	
        return $data['SerialNoInfo'];

    }
	
	function getcategoryInfo($UnitId)
    {
        $this->db->select('*');
        $this->db->from('tbl_role');
        $this->db->where('isDeleted', 0);		
        $this->db->where('role_id', $UnitId);
        $query = $this->db->get();
        
        return $query->result_array();
    }   
	
	function save_role($data)
    {
		$insert = $this->db->insert('tbl_role', $data);
	   
		$action="INSERT";
		$querytoaudittrail= $this->db->last_query();
		$this->audittrail($querytoaudittrail,$action);
		return $insert;
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
	
	function update_role($data)
    {
		$this->db->where('role_id', $data['role_id']);
		$this->db->update('tbl_role', $data);
		$action="UPDATE";
		$querytoaudittrail= $this->db->last_query();
		$this->audittrail($querytoaudittrail,$action);
		
		return TRUE;
		
	}
	
	function delete_category($deleteId, $userInfo)
    {
        $this->db->where('role_id', $deleteId);
        $this->db->update('tbl_role', $userInfo);
		$action="DELETE";
		$querytoaudittrail= $this->db->last_query();
		$this->audittrail($querytoaudittrail,$action);
        return $this->db->affected_rows();
    }
	
}
	
?>