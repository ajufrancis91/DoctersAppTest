<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Patient extends CI_Controller {
	
	public function __construct()
    {
     parent::__construct();
	 $this->load->helper("file");
	 $this->load->model('Loginmodel');
	 $this->load->model('Patient_model');	 
    }
  
    public function index()
    {		
		  $id=array();
		 $access=array();
		 $menuarr=array();
		 $accessflag=0;
		 $columns=array();
		 
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
		 if($this->session->userdata('role')==1){$accessflag=1;}
			
			
        $data = array(
            // Set title page
            'title' => 'Patient',            
            // Active menu on sidebar left
            'active_tables'=>'active',
            'active_table_datatable'=>'active',
            // Page Content
            
			'Smenu'=>$sidemenu,
            'page'=>''.$this->uri->segment(2).'',
            'parentname'=>$id[0],
            'result'=>$this->Patient_model->selectAllPatient()			
        );	

				$this->load->view('admin/header',$data);
				if($accessflag==1){
					$this->load->view('Master/patientlist');
					}
				else{
					$this->load->view('errors/404');
					}				
				$this->load->view('admin/footer');			
    }

    public function add()
    {	
    	 $id=array();
		 $columns=array();
		 $access=array();
		 $menuarr=array();
		 $accessflag=0;
		 
		 
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
		if($this->session->userdata('role')==1){$accessflag=1;}
	
        $data = array(
            // Set title page
            'title' => 'Add Patient',            
            // Active menu on sidebar left
            'active_tables'=>'active',
            'active_table_datatable'=>'active',            
			'Smenu'=>$sidemenu,
            'page'=>''.$this->uri->segment(2).'',
            'parentname'=>$id[0]			
        );		

				$this->load->view('admin/header',$data);				
				if($accessflag==1){
					$this->load->view('Master/PatientInfo');
					}
				else{
					$this->load->view('errors/404');
					}
				$this->load->view('admin/footer');	 		
	}
	 public function info($patient_id=NULL)
    {	
    	 $id=array();
		 $columns=array();
		 $access=array();
		 $menuarr=array();
		 $accessflag=0;
		 if($patient_id==''){
		 	//Redirect to patient list
		 }
		 else{
		 	
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
		if($this->session->userdata('role')==1){$accessflag=1;}
	
        $data = array(
            // Set title page
            'title' => 'Patient Info',            
            // Active menu on sidebar left
            'active_tables'=>'active',
            'active_table_datatable'=>'active',           
			'Smenu'=>$sidemenu,
            'page'=>''.$this->uri->segment(2).'',
            'parentname'=>$id[0],
            'result'=>$this->Patient_model->selectPatientInfoById($patient_id)	
        );		

		$this->load->view('admin/header',$data);				
		if($accessflag==1){
			$this->load->view('Master/PatientInfoView');
			}
		else{
			$this->load->view('errors/404');
			}
		$this->load->view('admin/footer'); 	
		 }		 	
	}

	public function caseRecord($patient_id=NULL)
    {	
    	 $id=array();
		 $columns=array();
		 $access=array();
		 $menuarr=array();
		 $accessflag=0;
		 if($patient_id==''){
		 	//Redirect to patient list
		 }
		 else{
		 	
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
		if($this->session->userdata('role')==1){$accessflag=1;}
	
        $data = array(
            // Set title page
            'title' => 'Patient Case Record',            
            // Active menu on sidebar left
            'active_tables'=>'active',
            'active_table_datatable'=>'active',
            // Page Content
            'page_content'=> 'Additem_view',
			'Smenu'=>$sidemenu,
            'page'=>''.$this->uri->segment(2).'',
            'parentname'=>$id[0],
            'patient_id'=>$patient_id,
            'result'=>$this->Patient_model->selectCaseRecordById($patient_id)	
        );		

		$this->load->view('admin/header',$data);				
		if($accessflag==1){
			$this->load->view('Master/PatientRecord');
			}
		else{
			$this->load->view('errors/404');
			}
		$this->load->view('admin/footer'); 	
		 }		 	
	}
	function SavePatient()
    {
       if ($this->input->server('REQUEST_METHOD') === 'POST')
       {
		   		 
				$UpdatedBy = $this->session->userdata('id');
				$data_to_store = array(				
				 'patient_name'  	=> $this->input->post('patient_name'), 
				 'op_no' 	=> $this->input->post('op_no'), 
				 'contact'		=> $this->input->post('contact'), 
				 'address'			=> $this->input->post('address'), 				
				 'created_on' =>  date('Y-m-d H:i:s'),
				 'last_updated' =>  date('Y-m-d H:i:s'),
				 'created_by' =>  $UpdatedBy,
				 'updated_by' =>  $UpdatedBy,
				 'is_deleted' => 0
				);
				$last_id=$this->Patient_model->save_patient($data_to_store);		
				if($last_id){
				 $myArr = array('success', 'Patient');
				 $this->session->set_flashdata('success', $myArr);
				 redirect(base_url()."admin/Patient/info/".$last_id); 				                  
				}
				else
				{
				 $myArr = array('error', 'Item');
				 $data['flash_message'] = FALSE;
				 $this->session->set_flashdata('success', $myArr);		
				}           
          }
       }

    function UpdatePatient()
    {
       if ($this->input->server('REQUEST_METHOD') === 'POST')
       {
		   		 
				$UpdatedBy = $this->session->userdata('id');
				$data_to_store = array(	
				'patient_id'  	=> $this->input->post('patient_id'), 			
				 'patient_name'  	=> $this->input->post('patient_name'), 
				 'op_no' 	=> $this->input->post('op_no'), 
				 'contact'		=> $this->input->post('contact'), 
				 'address'			=> $this->input->post('address'), 			 
				 'last_updated' =>  date('Y-m-d H:i:s'),				
				 'updated_by' =>  $UpdatedBy,
				 'is_deleted' => 0
				);
				$last_id=$this->Patient_model->update_patient($data_to_store);		
				if($last_id){
				 $myArr = array('updated', 'Patient');
				 $this->session->set_flashdata('success', $myArr);				 			                  
				}
				else
				{
				 $myArr = array('error', 'Patient');
				 $data['flash_message'] = FALSE;
				 $this->session->set_flashdata('success', $myArr);		
				} 
				redirect(base_url()."admin/Patient");          
          }
       }

    function SaveCaseRecord()
    {
       if ($this->input->server('REQUEST_METHOD') === 'POST')
       {	
       		$status=$this->input->post('status');
       		if($status==0){
       			//Insert case record
       			$UpdatedBy = $this->session->userdata('id');
				$data_to_store = array(
					 'patient_id' 		=>  $this->input->post('patient_id'),
					 'patient_name'  	=> $this->input->post('patient_name'),				  
					 'age'			=> $this->input->post('age'), 
					 'complaints'			=> $this->input->post('complaints'),
					 'health_level'			=> $this->input->post('health_level'), 
					 'appetite'			=> $this->input->post('appetite'), 
					 'thrist'			=> $this->input->post('thrist'), 
					 'bowels'			=> $this->input->post('bowels'), 
					 'urine'			=> $this->input->post('urine'), 
					 'sweat'			=> $this->input->post('sweat'), 
					 'sleet'			=> $this->input->post('sleet'), 
					 'thermal_reaction'			=> $this->input->post('thermal_reaction'), 
					 'family_history'			=> $this->input->post('family_history'), 
					 'menustrual_history'			=> $this->input->post('menustrual_history'), 
					 'symtoms_totality'			=> $this->input->post('symtoms_totality'), 
					 'pathology'			=> $this->input->post('pathology'), 
					 'key_note'			=> $this->input->post('key_note'), 
					 'prescription'			=> $this->input->post('prescription'), 
					 'created_on' =>  date('Y-m-d H:i:s'),
					 'last_updated' =>  date('Y-m-d H:i:s'),
					 'created_by' =>  $UpdatedBy,
					 'updated_by' =>  $UpdatedBy,
					 'is_deleted' => 0
				);
								
				if($this->Patient_model->save_caseRecord($data_to_store)){
				 $myArr = array('success', 'Case Record');
				 $this->session->set_flashdata('success', $myArr);					                  
				}
				else
				{
				 $myArr = array('error', 'Item');
				 $data['flash_message'] = FALSE;
				 $this->session->set_flashdata('success', $myArr);		
				}     
				redirect(base_url()."admin/Patient");
       		}
       		else{
       			//Update case record
       			$UpdatedBy = $this->session->userdata('id');
				$data_to_store = array(
					 'patient_id' 		=>  $this->input->post('patient_id'),
					 'patient_name'  	=> $this->input->post('patient_name'),				  
					 'age'			=> $this->input->post('age'), 
					 'complaints'			=> $this->input->post('complaints'),
					 'health_level'			=> $this->input->post('health_level'), 
					 'appetite'			=> $this->input->post('appetite'), 
					 'thrist'			=> $this->input->post('thrist'), 
					 'bowels'			=> $this->input->post('bowels'), 
					 'urine'			=> $this->input->post('urine'), 
					 'sweat'			=> $this->input->post('sweat'), 
					 'sleet'			=> $this->input->post('sleet'), 
					 'thermal_reaction'			=> $this->input->post('thermal_reaction'), 
					 'family_history'			=> $this->input->post('family_history'), 
					 'menustrual_history'			=> $this->input->post('menustrual_history'), 
					 'symtoms_totality'			=> $this->input->post('symtoms_totality'), 
					 'pathology'			=> $this->input->post('pathology'), 
					 'key_note'			=> $this->input->post('key_note'), 
					 'prescription'			=> $this->input->post('prescription'), 				
					 'last_updated' =>  date('Y-m-d H:i:s'),				
					 'updated_by' =>  $UpdatedBy,
					 'is_deleted' => 0
				);
								
				if($this->Patient_model->update_caseRecord($data_to_store)){
				 $myArr = array('updated', 'Case Record');
				 $this->session->set_flashdata('success', $myArr);					                  
				}
				else
				{
				 $myArr = array('error', 'Case Record');
				 $data['flash_message'] = FALSE;
				 $this->session->set_flashdata('success', $myArr);		
				}     
				redirect(base_url()."admin/Patient");

       		}
		   		 
				 
           
          }
       }
	   
    
	   
	   
	   function deletePatient()
    
		{  		
			$deleteId = $this->input->post('HFdelid');
			$value = array('is_deleted'=>1);              
			$result = $this->Patient_model->delete_patient($deleteId, $value);
			if($result)
				{
					$myArr = array('deleted', 'Patient');	
					$this->session->set_flashdata('success', $myArr);		               
			}
			else
				{
				$myArr = array('error', 'Expense Type');	
				$data['flash_message'] = FALSE;
				$this->session->set_flashdata('success', $myArr);				  
			} 
			redirect(base_url()."admin/Patient");   
   }

}