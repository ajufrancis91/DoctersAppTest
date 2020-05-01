<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Menurights_model extends CI_Model
{
    
    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    function selectmenurights()
    {
        $this->db->select('tbl_menurights.menurights_id,tbl_menurights.id, tbl_menurights.rights,tbl_role.role,tbl_menumaster.menuname');
        $this->db->from('tbl_menurights');     
		$this->db->join('tbl_role', 'tbl_menurights.role_id = tbl_role.role_id');
		$this->db->join('tbl_menumaster', 'tbl_menurights.menu_id = tbl_menumaster.menuID');
        $this->db->where('tbl_menurights.isDeleted', 0);
        $query = $this->db->get();
        
       	return $query->result_array(); 	
    }
	 function selectmenu()
    {
        $this->db->select('tbl_menumaster.menuID,tbl_menumaster.menuname');
        $this->db->from('tbl_menumaster');     
        $this->db->where('tbl_menumaster.isDeleted', 0);
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
	
	function getmenurightsInfo($UnitId)
    {
        $this->db->select('*');
        $this->db->from('tbl_menurights');
        $this->db->where('isDeleted', 0);		
        $this->db->where('menurights_id', $UnitId);
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
	function save_menurights($data)
    {
		$insert = $this->db->insert('tbl_menurights', $data);
		$action="INSERT";
		$querytoaudittrail= $this->db->last_query();
		$this->audittrail($querytoaudittrail,$action);
	    return $insert;
	}
	
	function update_menurights($data)
    {
		$this->db->where('menurights_id', $data['menurights_id']);
		$this->db->update('tbl_menurights', $data);
		$action="UPDATE";
		$querytoaudittrail= $this->db->last_query();
		$this->audittrail($querytoaudittrail,$action);
		$this->db->last_query();
		return TRUE;
		
	}
	
	function delete_menurights($deleteId, $userInfo)
    {
        $this->db->where('menurights_id', $deleteId);
        $this->db->update('tbl_menurights', $userInfo);
		$action="DELETE";
		$querytoaudittrail= $this->db->last_query();
		$this->audittrail($querytoaudittrail,$action);
        return $this->db->affected_rows();
    }
	
	
		function SelectRightsbyJobroleMenuid($jobrole,$menuid)
    {
        $this->db->select('tbl_menurights.menurights_id,tbl_menurights.rights');
        $this->db->from('tbl_menurights');			
        $this->db->where('tbl_menurights.isDeleted', 0);
		$this->db->where('tbl_menurights.role_id', $jobrole);
		$this->db->where('tbl_menurights.menu_id', $menuid);
        $query = $this->db->get();        
       	return $query->num_rows(); 	
		 
    }
	
}
	
?>