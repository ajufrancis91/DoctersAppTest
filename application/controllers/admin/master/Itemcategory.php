<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Itemcategory extends CI_Controller {
	
	public function __construct()
    {
     parent::__construct();
	  $this->load->model('Loginmodel');	
	 $this->load->model('Itemcategory_model');
	 
	 
    }
  
    public function index()
    {		
		 $id=array();
		 $columns=array();
		 
		 $columns=[
		     [
                'label'=> 'Department ID',
                'property'=> 'department_id',
                'sortable'=> true
             ],
             [
                'label'=> 'Department Name',
                'property'=> 'department_name',
                'sortable'=> true
             ]
		 ]; 
		 $CI =& get_instance();
		 $CI->load->model('Loginmodel');			
		 $sidemenu = $CI->Loginmodel->getSideMenu();
		 foreach($sidemenu as $menu){ 
			 if($menu['Page']==$this->uri->segment(2)){
				 $id[]=$menu['parentID'];
			 }			 
		 }		
		 
	
        $data = array(
            // Set title page
            'title' => 'Itemcategory_view',
            
            // Active menu on sidebar left
            'active_tables'=>'active',
            'active_table_datatable'=>'active',
            // Page Content
            'page_content'=> 'Itemcategory_view',
			'Smenu'=>$sidemenu,
            'page'=>''.$this->uri->segment(2).'',
            'parentname'=>$id[0],
            'result'=>$this->Itemcategory_model->selectcategory(),
            'columns'=>$columns
			// 'ExpenseApprovalNum'=>$this->login_model->getnumofexpenseforapproval(),
			// 'TravelApprovalNum'=>$this->login_model->getnumoftravelforapproval(),
			// 'LeaveApprovalNum'=>$this->login_model->getnumofleaveforapproval()
        );		

				$this->load->view('admin/header',$data);
				//$this->load->view('admin/nametitle_view');
				$this->load->view('Master/Itemcategory_view');
				$this->load->view('admin/footer');	 		
    }
	function savecategory()
    {
       if ($this->input->server('REQUEST_METHOD') === 'POST')
       {
            
            $type='category';
			
            $data['SerialNoInfo'] = $this->Itemcategory_model->getCommonParameters($type); 	
			$paddata=str_pad($data['SerialNoInfo'][0]['value'],4,"0",STR_PAD_LEFT);
			$UpdatedBy = $this->session->userdata('adminID');
            $DepartmentId=$data['SerialNoInfo'][0]['prefix'].'_'.$paddata;  
            $data_to_store = array(
			 'category_id' 		=>  $DepartmentId ,
			 'category_code'  	=> ucfirst($this->input->post('category_code')), 
             'category_name' 	=> ucfirst($this->input->post('category_name')), 
			 'stocktype'		=> ucfirst($this->input->post('stocktype')), 
             'halal'			=> ucfirst($this->input->post('halal')), 
			 'CreatedOn' =>  date('Y-m-d H:i:s'),
			 'LastUpdated' =>  date('Y-m-d H:i:s'),
			 'CreatedBy' =>  $UpdatedBy,
			 'UpdatedBy' =>  $UpdatedBy,
             'isDeleted' => 0
            );
			
            //if the save_department has returned true then we show the flash message	
			
			if($this->Itemcategory_model->save_category($data_to_store)){
			 $myArr = array('success', 'Itemcategory');
			 $this->session->set_flashdata('success', $myArr);			
			 redirect(base_url()."admin/Itemcategory");                   
            }
			else
			{
			 $myArr = array('error', 'Itemcategory');
             $data['flash_message'] = FALSE;
			 $this->session->set_flashdata('success', $myArr);		
            }
          }
       }
	   
	   function deletecategory()
    
		{  		
			$deleteId = $this->input->post('HFdelid');
			$value = array('isDeleted'=>1);              
			$result = $this->Itemcategory_model->delete_category($deleteId, $value);
			if($result)
				{
					$myArr = array('deleted', 'Expense Type');	
					$this->session->set_flashdata('success', $myArr);
					redirect(base_url()."admin/Itemcategory");                
			}
			else
				{
				$myArr = array('error', 'Expense Type');	
				$data['flash_message'] = FALSE;
				$this->session->set_flashdata('success', $myArr);				  
			}       
   
   }
   
}