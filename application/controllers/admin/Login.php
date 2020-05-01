<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
    {
     parent::__construct();
	  $this->load->model('Loginmodel');	
	  $this->load->library("encrypt");
	 
    }
	public function index()
	{
		
		
	
	
		$this->load->model("Loginmodel");
			//$res = $this->Loginmodel->getTypename();
			//$data["skill"] = $res ;
		$this->load->view('admin/login_view');
		
			
	}

	public function getlogin()
	{
		
		$this->load->library("encrypt");


		 $user_name = $_REQUEST['user_name'];
		 $password = $_REQUEST['password'];
		 
		
	if($user_name!='' And $password!='')
		{
			$this->load->model('loginmodel');

			$admindetails = $this->loginmodel->getadmin($user_name,$password);
			
			if(count($admindetails) > 0)
            {
                foreach ($admindetails as $res)
                {
					$menurights = $this->loginmodel->getMenuRights($res->role);		
					$sessionArray = array(                   
                                            'id'=>$res->id,									
											'role'=>$res->role,
											'userrole'=>$res->userrole,
                                            'username'=>$res->username,
											'first_name'=>$res->first_name,
											'employee_id'=>$res->employee_id,
											'MenuRightsdata' => $menurights,		
											
                                    );                                   
                    $this->session->set_userdata($sessionArray);	
                    redirect(base_url()."admin/Dashboard");
				}
			}
			else
			{
				$this->session->set_flashdata("error","Invalid User");
				redirect(base_url()."admin/Login");
				
			}

				// if(isset($admindetails['password']))
				// {


					 // $passwordcode = $admindetails['password'];

					// if($password == $passwordcode and $admindetails['password'])
					// {

					// $this->session->set_userdata("adminID" , $admindetails["username"]);
					// $this->session->set_userdata("adminName" , $admindetails["first_name"]);
					// $this->session->set_userdata("adminEmail" , $admindetails["email"]);	
					// redirect(base_url()."admin/Dashboard");
					// }
					// else
					// {
						// $this->session->set_flashdata("error","Invalid User");
						// redirect(base_url()."admin/Login");
						// exit;
					// }

				// //invalid logins
				// }
				// else
				// {
					// $this->session->set_flashdata("error","Invalid User");
					// redirect(base_url()."admin/Login");
					// exit;
				// }
			
						
		}
		
		else if($user_name=='')
		{
			
				$this->session->set_flashdata("error","Please Enter UserName");
				redirect(base_url()."admin/Login");
				exit;
		}
		else if($password=='')
		{
				$this->session->set_flashdata("error","Please Enter Password ");
					
				redirect(base_url()."admin/Login");
			exit;
		}
	}
			 function getlogOut(){
			
				
				session_destroy();
					redirect(base_url()."admin/Login");
					exit;
				
			}
			
	     public function ForgotPassword()
		{	
         $email = $this->input->post('email'); 
		 
         $findemail = $this->Loginmodel->ForgotPassword($email);  
		 
         if($findemail){
          $this->sendpassword($findemail);        
           }else{
				$myArr = array('mail', 'Email is not found');
		     $this->session->set_flashdata('error', $myArr);
          redirect(base_url().'admin/Login','refresh');
      }
   }		
	 public function sendpassword($data)
{
        $email = $data['email'];
        $query1=$this->db->query("SELECT *  from tbl_users where email = '".$email."' ");
        $row=$query1->result_array();
        if ($query1->num_rows()>0)
      
{
        $passwordplain = "";
        $passwordplain  = $this->random_password();
        $newpass['password'] = password_hash($passwordplain, PASSWORD_DEFAULT);
        $this->db->where('email', $email);
        $this->db->update('tbl_users', $newpass); 
        $mail_message='Dear '.$row[0]['first_name'].','. "\r\n";
        $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
      
       require_once(APPPATH.'PHPMailer/PHPMailerAutoload.php');
        $mail = new PHPMailer;
        $mail->isSMTP();
       	$mail->Debugoutput = "html";
		$mail->SMTPSecure = "ssl";  
		 $mail->Host       = "smtp.googlemail.com";
		$mail->SMTPAuth = true; 				 // setting GMail as our SMTP server
		$mail->Port       = 465;        
		$mail->Username = 'narennaran@gmail.com';
		$mail->Password ='mynation123'; 
        $mail->setFrom('narennaran@gmail.com', 'Hexagon Nutrition');
        $mail->IsHTML(true);
        $mail->addAddress($email);
        $mail->Subject = 'Password Reset';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
if (!$mail->send()) {
     $this->session->set_flashdata('mail','Failed to send password, please try again!');
	 $this->session->set_flashdata('mail', $myArr);
	 redirect(base_url().'admin/Login'); 
} else {

   $myArr = array('success', 'Password sent to your email!');
	$this->session->set_flashdata('mail', $myArr);
   redirect(base_url()."admin/Login");  
}
        
}
else
{  
 $this->session->set_flashdata('mail','Email not found try again!');
 $this->session->set_flashdata('mail', $myArr);
 redirect(base_url().'admin/Login');
}
}		
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}			
}
