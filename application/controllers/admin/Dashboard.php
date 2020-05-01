<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
    {
     parent::__construct();
	  $this->load->model('Loginmodel');	
	  $this->load->model('Dashboard_model');	 
    }
	
	public function index()
	
	{ $id=array();
		$CI =& get_instance();
		 $CI->load->model('Loginmodel');
		 $sidemenu = $CI->Loginmodel->getSideMenu();		 
		 foreach($sidemenu as $menu){ 
			 if($menu['Page']==$this->uri->segment(2)){
				 $id[]=$menu['parentID'];
			 }
			 
		 }	
 			$data = array(
 // Page Content
            'page_content'=> 'Dashboard',
			'Smenu'=>$sidemenu,
            'page'=>''.$this->uri->segment(2).'',
            'parentname'=>$id[0]			
			);	
				
				$this->load->view('admin/header',$data);
				$this->load->view('admin/dashboard_view');
				$this->load->view('admin/footer');
	}
	
	function Profile($UserId = Null){
	
	
	 $id=array();
		 $columns=array();
		 
		 $columns=[
		     [
                'label'=> 'Employee',
                'property'=> 'Employee_id',
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
			 }			 
		 }		
		 
	
        $data = array(
            // Set title page
            'title' => 'Profile',            
            // Active menu on sidebar left
            'active_tables'=>'active',
            'active_table_datatable'=>'active',            
			'Smenu'=>$sidemenu,
            'page'=>''.$this->uri->segment(2).'',
            'parentname'=>$id[0],
            'result'=>$this->Dashboard_model->getUserInfo($UserId),			
            'columns'=>$columns
        );

				$this->load->view('admin/header',$data);
				$this->load->view('admin/profile');
				$this->load->view('admin/footer');	
	
	}
	 function UpdateProfile()
    {
       if ($this->input->server('REQUEST_METHOD') === 'POST')
       {
		   		 
				$UpdatedBy = $this->session->userdata('id');
				$data_to_store = array(	
				'id'  	=> $this->input->post('HFid'), 			
				 'name'  	=> $this->input->post('name'), 
				 'email' 	=> $this->input->post('email'), 
				 'username' 	=> $this->input->post('email'), 
				 'contact'		=> $this->input->post('contact'), 
				 'address'			=> $this->input->post('address'), 				 
				 'last_updated' =>  date('Y-m-d H:i:s'),				
				 'updated_by' =>  $UpdatedBy,
				 'is_deleted' => 0
				);
				$last_id=$this->Dashboard_model->update_Profile($data_to_store);		
				if($last_id){
				 $myArr = array('updated', 'Profile');
				 $this->session->set_flashdata('success', $myArr);				 			                  
				}
				else
				{
				 $myArr = array('error', 'Profile');
				 $data['flash_message'] = FALSE;
				 $this->session->set_flashdata('success', $myArr);		
				} 
				redirect(base_url()."admin/Dashboard");          
          }
       }
		
}
