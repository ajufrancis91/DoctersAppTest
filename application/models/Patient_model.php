<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Patient_model extends CI_Model
{
    
    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    function selectAllPatient()
    {
        $this->db->select('tbl_patient.*');
        $this->db->from('tbl_patient');     
        $this->db->where('tbl_patient.is_deleted', 0);
        $query = $this->db->get();        
       	return $query->result_array(); 	
    }
	
	
	function selectPatientInfoById($patient_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_patient');       	
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get();        
        return $query->result_array();
    }
    function selectCaseRecordById($patient_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_case_record');         
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get();        
        return $query->result_array();
    }
	function getCategoryType($category_id)
    {
        $this->db->select('Item.category_id,Item.category_code,StockType.stocktype,StockType.stocktype_id');
        $this->db->from('tbl_itemcategory Item');   
		$this->db->join('tbl_stocktype StockType', 'StockType.stocktype_id = Item.stocktype');		
        $this->db->where('Item.isDeleted', 0);
		$this->db->where('Item.category_id', $category_id);
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
	
	function save_patient($data)
    {
		$insert = $this->db->insert('tbl_patient', $data);
        $insert_id = $this->db->insert_id();
		$action="INSERT";
				$querytoaudittrail= $this->db->last_query();
				$this->audittrail($querytoaudittrail,$action);
	    return $insert_id;
	}

    function save_caseRecord($data)
    {
        $insert = $this->db->insert('tbl_case_record', $data);
        $insert_id = $this->db->insert_id();
        $action="INSERT";
                $querytoaudittrail= $this->db->last_query();
                $this->audittrail($querytoaudittrail,$action);
        return $insert_id;
    }
	
	function update_patient($data)
    {
		$this->db->where('patient_id', $data['patient_id']);
		$this->db->update('tbl_patient', $data);
        $affected=$this->db->affected_rows();
		$action="UPDATE";
		 $querytoaudittrail= $this->db->last_query();
		$this->audittrail($querytoaudittrail,$action);
		return $affected;
		
	}

    function update_caseRecord($data)
    {
        $this->db->where('patient_id', $data['patient_id']);
        $this->db->update('tbl_case_record', $data);
        $action="UPDATE";
        $querytoaudittrail= $this->db->last_query();
        $this->audittrail($querytoaudittrail,$action);
        return TRUE;
        
    }
	
	function delete_patient($deleteId, $userInfo)
    {
        $this->db->where('patient_id', $deleteId);
        $this->db->update('tbl_patient', $userInfo);
        $affected=$this->db->affected_rows();
		$action="DELETE";
		$querytoaudittrail= $this->db->last_query();
		$this->audittrail($querytoaudittrail,$action);
        $this->db->where('patient_id', $deleteId);
        $this->db->update('tbl_case_record', $userInfo);
        $affected2=$this->db->affected_rows();
        if($affected2>0){
             $action="DELETE";
             $querytoaudittrail= $this->db->last_query();
            $this->audittrail($querytoaudittrail,$action);
        }       
        return $affected;
    }
	function getStockTypeInfo($prefix)
    {
        $this->db->select('*');
        $this->db->from('tbl_stocktype');      		
        $this->db->where('prefix', $prefix);
        $query = $this->db->get();        
        return $query->result_array();
    }
	function getUnitInfo($unitname)
    {
        $this->db->select('*');
        $this->db->from('tbl_unitofmeasure');        	
        $this->db->where('unitofmeasure', $unitname);
        $query = $this->db->get();        
        return $query->result_array();
    }
	
}
	
?>