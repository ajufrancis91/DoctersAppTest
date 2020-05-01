<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Role extends CI_Controller {
	
	public function __construct()
    {
     parent::__construct();
	  $this->load->model('Loginmodel');	
	 $this->load->model('Role_model');
	 
	 
    }
  
    public function index()
    {		
		 $id=array();
		 $columns=array();
		 $access=array();
		 $menuarr=array();
		 $accessflag=0;
		 
		 $columns=[
		     [
                'label'=> 'Role_id',
                'property'=> 'Role_id',
                'sortable'=> true
             ],
             [
                'label'=> 'Unit Name',
                'property'=> 'Unit_name',
                'sortable'=> true
             ]
		 ]; 
		 $CI =& get_instance();
		 $CI->load->model('Loginmodel');			
		 $sidemenu = $CI->Loginmodel->getSideMenu();
		 foreach($sidemenu as $menu){ 
			 if($menu['Page']==$this->uri->segment(2)){
				 $id[]=$menu['parentID'];
				 $access[]=$menu['menuID'];
			 }			 
		 }
		 $menuarr=$this->session->userdata('MenuRightsdata');
		foreach($menuarr as $menuright){
			if($menuright['menu_id']==$access[0] && $menuright['rights']=='Yes'){
				$accessflag=1;
			}
		}
		if($this->session->userdata('TypeId')==0){$accessflag=1;}
		 
	
        $data = array(
            // Set title page
            'title' => 'Role',
            
            // Active menu on sidebar left
            'active_tables'=>'active',
            'active_table_datatable'=>'active',
            // Page Content
            'page_content'=> 'Role',
			'Smenu'=>$sidemenu,
            'page'=>''.$this->uri->segment(2).'',
            'parentname'=>$id[0],
            'result'=>$this->Role_model->selectRole(),
            'columns'=>$columns
			// 'ExpenseApprovalNum'=>$this->login_model->getnumofexpenseforapproval(),
			// 'TravelApprovalNum'=>$this->login_model->getnumoftravelforapproval(),
			// 'LeaveApprovalNum'=>$this->login_model->getnumofleaveforapproval()
        );		

				$this->load->view('admin/header',$data);
				//$this->load->view('admin/nametitle_view');
				
				if($accessflag==1){
					$this->load->view('Master/Role_view');
					}
				else{
					$this->load->view('errors/404');
					}
				$this->load->view('admin/footer');	 		
    }
	function saveRole()
    {
       if ($this->input->server('REQUEST_METHOD') === 'POST')
       {
            
            $type='Role';
			
            $data['SerialNoInfo'] = $this->Role_model->getCommonParameters($type); 	
			$paddata=str_pad($data['SerialNoInfo'][0]['value'],4,"0",STR_PAD_LEFT);
			$UpdatedBy = $this->session->userdata('id');
            $UnitId=$data['SerialNoInfo'][0]['prefix'].'_'.$paddata;  
            $data_to_store = array(
			 'role_id' 		=>   $UnitId ,
			 'role'  	=> ucfirst($this->input->post('role')), 
			 'CreatedOn' =>  date('Y-m-d H:i:s'),
			 'LastUpdated' =>  date('Y-m-d H:i:s'),
			 'CreatedBy' =>  $UpdatedBy,
			 'UpdatedBy' =>  $UpdatedBy,
             'isDeleted' => 0
            );
			
            //if the save_department has returned true then we show the flash message	
			
			if($this->Role_model->save_role($data_to_store)){
			 $myArr = array('success', 'Role');
			 $this->session->set_flashdata('success', $myArr);			
			 redirect(base_url()."admin/Role");                   
            }
			else
			{
			 $myArr = array('error', 'Role');
             $data['flash_message'] = FALSE;
			 $this->session->set_flashdata('success', $myArr);		
            }
          }
       }
	   function updateRole()
    {
       if ($this->input->server('REQUEST_METHOD') === 'POST')
       {
			$UpdatedBy = $this->session->userdata('id');         
            $data_to_update = array(
              'role_id' 		=>   $this->input->post('HFid') ,
			  'role'  	=> ucfirst($this->input->post('role')), 
		      'LastUpdated' =>  date('Y-m-d H:i:s'),
		      'CreatedBy' =>  $UpdatedBy,
		      'UpdatedBy' =>  $UpdatedBy,
		      'isDeleted' => 0
			);
		   
            //if the update_expensetype has returned true then we show the flash message
		 	
            if($this->Role_model->update_role($data_to_update))
		    {
		     $myArr = array('updated', 'Role');
		     $this->session->set_flashdata('success', $myArr);
		     redirect(base_url()."admin/Role");                
            }
		    else
		    {
			 $myArr = array('error', 'Role Type');
             $data['flash_message'] = FALSE;
			 $this->session->set_flashdata('success', $myArr);				  
            }
          }
        }
    
	   
	   
	   function deleteRole()
    
		{  		
			$deleteId = $this->input->post('HFdelid');
			$value = array('isDeleted'=>1);              
			$result = $this->Role_model->delete_category($deleteId, $value);
			if($result)
				{
					$myArr = array('deleted', 'Role');	
					$this->session->set_flashdata('success', $myArr);
					redirect(base_url()."admin/Role");                
			}
			else
				{
				$myArr = array('error', 'Role');	
				$data['flash_message'] = FALSE;
				$this->session->set_flashdata('success', $myArr);				  
			}       
   
   }

}