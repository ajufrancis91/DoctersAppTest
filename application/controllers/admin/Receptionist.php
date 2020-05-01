<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Receptionist extends CI_Controller {
	
	public function __construct()
    {
     parent::__construct();
	 $this->load->helper("file");
	 $this->load->model('Loginmodel');
	 $this->load->model('Receptionist_model');	 
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
            'result'=>$this->Receptionist_model->selectAllReceptionist()			
        );	

				$this->load->view('admin/header',$data);
				if($accessflag==1){
					$this->load->view('Master/Receptionistlist');
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
            'title' => 'Add Receptionist',            
            // Active menu on sidebar left
            'active_tables'=>'active',
            'active_table_datatable'=>'active',            
			'Smenu'=>$sidemenu,
            'page'=>''.$this->uri->segment(2).'',
            'parentname'=>$id[0]			
        );		

				$this->load->view('admin/header',$data);				
				if($accessflag==1){
					$this->load->view('Master/AddReceptionist');
					}
				else{
					$this->load->view('errors/404');
					}
				$this->load->view('admin/footer');	 		
	}
	 public function edit($recpt_id=NULL)
    {	
    	 $id=array();
		 $columns=array();
		 $access=array();
		 $menuarr=array();
		 $accessflag=0;
		 if($recpt_id==''){
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
            'title' => 'Receptionist Info',            
            // Active menu on sidebar left
            'active_tables'=>'active',
            'active_table_datatable'=>'active',           
			'Smenu'=>$sidemenu,
            'page'=>''.$this->uri->segment(2).'',
            'parentname'=>$id[0],
            'result'=>$this->Receptionist_model->selectReceptionistById($recpt_id)	
        );		

		$this->load->view('admin/header',$data);				
		if($accessflag==1){
			$this->load->view('Master/ReceptionistView');
			}
		else{
			$this->load->view('errors/404');
			}
		$this->load->view('admin/footer'); 	
		 }		 	
	}

	
	function SaveReceptionist()
    {
       if ($this->input->server('REQUEST_METHOD') === 'POST')
       {
		   		 
				$UpdatedBy = $this->session->userdata('id');
				$data_to_store = array(				
				 'name'  	=> $this->input->post('name'), 
				 'username' 	=> $this->input->post('email'), 
				 'email' 	=> $this->input->post('email'), 
				 'contact'		=> $this->input->post('contact'), 
				 'address'			=> $this->input->post('address'), 		
				 'role'			=> 2, 			
				 'created_on' =>  date('Y-m-d H:i:s'),
				 'last_updated' =>  date('Y-m-d H:i:s'),
				 'created_by' =>  $UpdatedBy,
				 'updated_by' =>  $UpdatedBy,
				 'is_deleted' => 0
				);
				$last_id=$this->Receptionist_model->save_Receptionist($data_to_store);		
				if($last_id){
				 $myArr = array('success', 'Receptionist');
				 $this->session->set_flashdata('success', $myArr);
				 redirect(base_url()."admin/Receptionist"); 				                  
				}
				else
				{
				 $myArr = array('error', 'Item');
				 $data['flash_message'] = FALSE;
				 $this->session->set_flashdata('success', $myArr);		
				}           
          }
       }

    function UpdateReceptionist()
    {
       if ($this->input->server('REQUEST_METHOD') === 'POST')
       {
		   		 
				$UpdatedBy = $this->session->userdata('id');
				$data_to_store = array(	
				'id'  	=> $this->input->post('recpt_id'), 			
				 'name'  	=> $this->input->post('name'), 
				 'email' 	=> $this->input->post('email'), 
				 'username' 	=> $this->input->post('email'), 
				 'contact'		=> $this->input->post('contact'), 
				 'address'			=> $this->input->post('address'), 				 
				 'last_updated' =>  date('Y-m-d H:i:s'),				
				 'updated_by' =>  $UpdatedBy,
				 'is_deleted' => 0
				);
				$last_id=$this->Receptionist_model->update_Receptionist($data_to_store);		
				if($last_id){
				 $myArr = array('updated', 'Receptionist');
				 $this->session->set_flashdata('success', $myArr);				 			                  
				}
				else
				{
				 $myArr = array('error', 'Receptionist');
				 $data['flash_message'] = FALSE;
				 $this->session->set_flashdata('success', $myArr);		
				} 
				redirect(base_url()."admin/Receptionist");          
          }
       }

   
    
	   
	   
	   function deleteReceptionist()
    
		{  		
			$deleteId = $this->input->post('HFdelid');
			$value = array('is_deleted'=>1);              
			$result = $this->Receptionist_model->delete_Receptionist($deleteId, $value);
			if($result)
				{
					$myArr = array('deleted', 'Receptionist');	
					$this->session->set_flashdata('success', $myArr);		               
			}
			else
				{
				$myArr = array('error', 'Receptionist');	
				$data['flash_message'] = FALSE;
				$this->session->set_flashdata('success', $myArr);				  
			} 
			redirect(base_url()."admin/Receptionist");   
   }

   function sendmail(){
   	$user_id=$this->input->post('HFUserId');
	 ob_start();
	 
	$UpdatedBy = $this->session->userdata('id');
	$UserInfo = $this->Receptionist_model->selectReceptionistById($user_id);
	$email1=$UserInfo[0]['email'];
	$name=$UserInfo[0]['name'];
	$username=$UserInfo[0]['username'];
	$link ="<a href='".base_url()."admin/Login' target='_blank'> Click Here</a> \r\n";
      
	
	require_once(APPPATH.'PHPMailer/PHPMailerAutoload.php');
	$password = $this->random_password();
	//$password ='12345';
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);          
          $data_to_update = array(
            'id' => $user_id,            
            'password' => $hashed_password,
            'last_updated' =>  date('Y-m-d H:i:s'),
            'updated_by' =>  $UpdatedBy,
          );
	$this->Receptionist_model->update_Receptionist($data_to_update);
	$mail = new PHPMailer();
	$mail->IsSMTP(); // we are going to use SMTP
	$mail->SMTPAuth   = true; // enabled SMTP authentication				
	$mail->SMTPSecure = "ssl";  
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	$msgbody='';
	$subject='';		
	$msgbody='Hi '.$name.', <br/> Your account has been activated <br/> Username:'.$username.'</br> Password:'.$password.'</br>'.$link;
	$subject='Doctor App';					
	
	$mail->Host       = "smtp.googlemail.com";      // setting GMail as our SMTP server
	$mail->Port       = 465;        
	$mail->Username = 'doctorapps19@gmail.com';
	$mail->Password ='doctorapp123';
	$mail->setFrom('doctorapps19@gmail.com', 'Doctor App');
	$mail->IsHTML(true);	
	$mail->Body = $msgbody;
	$mail->Subject = $subject;
	$mail->addAddress($email1, 'Doctor App');	 
	 $mail->SMTPDebug = 1;
				 
			if ($mail->send())
			{
				echo 'Mail sent';
				$myArr = array('mail', 'Mail');	
				$this->session->set_flashdata('success', $myArr);
			} 
			else
			{				 
				echo "Mailer Error: " . $mail->ErrorInfo;
				$myArr = array('error', 'Receptionist');
				$this->session->set_flashdata('success', $myArr);
			} 
			
			redirect("admin/Receptionist");  
	}
	public function random_password($length = 8)
    {
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$^&*";
      $password = substr( str_shuffle( $chars ), 0, $length );
      return $password;
    }
}