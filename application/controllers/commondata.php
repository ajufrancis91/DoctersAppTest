<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class commondata extends CI_Controller {

    public function index()
    {
		echo 'ghj';
    }

	
	public function Role_Edit()
	{
		$url='admin/Role/updaterole';
		$RoleId= $this->input->post('expsid');
		$this->load->model('Role_model');
		$RoleInfo = $this->Role_model->getcategoryInfo($RoleId);
		$html='';
		$html.=	'<form id="demo-form2" action="'.base_url().$url.'" method="post" data-parsley-validate class="form-horizontal form-label-left">



		 <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Supplier Type<span class="required">*</span>
						</label>
							<div class="col-xs-6">
							<input name="role" type="text" class="form-control" required="required" placeholder="Role" value="'.$RoleInfo [0]['role'].'">
								<input type="hidden" id="HFid" name="HFid" value="'.$RoleInfo [0]['role_id'].'" />
							</div>
					</div>

		<div class="modal-footer">
						<button type="button" id="close" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
					</div>
		</form>';
		echo json_encode($html);
	}

	

	public function Employee_Edit()
	{
		$url='admin/Employee/updateemployee';
		$EmployeeId= $this->input->post('expsid');
		$this->load->model('Employee_model');
		$this->load->model('Location_model');
		$this->load->model('Role_model');
		$Role=$this->Role_model->selectrole();
		$EmployeeInfo = $this->Employee_model->getEmployeeInfo($EmployeeId);
		$Location=$this->Location_model->selectlocation();
		$html='';
		$html.=	'<form id="demo-form2" action="'.base_url().$url.'" method="post" data-parsley-validate class="form-horizontal form-label-left">



		   <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Login <span class="required">*</span>
						</label>
							<div class="col-xs-6">
								<input name="username" readonly="readonly" type="text" class="form-control" required="required" placeholder="User Login " value="'.$EmployeeInfo [0]['username'].'">
								<input type="hidden" id="HFid" name="HFid" value="'.$EmployeeInfo [0]['employee_id'].'" />
							</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name<span class="required">*</span>
						</label>
							<div class="col-xs-6">
								<input name="first_name" type="text" class="form-control" required="required" placeholder="Full Name" value="'.$EmployeeInfo [0]['first_name'].'">
							</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name<span class="required">*</span>
						</label>
							<div class="col-xs-6">
								<input name="last_name" type="text" class="form-control" required="required" placeholder="Full Name" value="'.$EmployeeInfo [0]['last_name'].'">
							</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telephone<span class="required">*</span>
						</label>
							<div class="col-xs-6">
								<input name="telephone" type="text" class="form-control" required="required" placeholder="Telephone" value="'.$EmployeeInfo [0]['contact_phone'].'">
							</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email Address<span class="required">*</span>
						</label>
							<div class="col-xs-6">
								<input name="email" type="email" class="form-control" required="required" placeholder="Email Address" value="'.$EmployeeInfo [0]['email'].'">
							</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Security Role<span class="required">*</span>
						</label>
							<div class="col-xs-6">
									<select class="form-control"type="text" id="role" required="required"  name="role" placeholder="Security Role " value="'.$EmployeeInfo [0]['role'].'">
									<option value=""> Select Security Role</option>';
									foreach($Role as $row){
									if(($EmployeeInfo[0]['role'])==$row['role'])
									{
										$html.='<option  value="'.$row['role_id'].'" selected = "selected"  >'.$row['role'].'</option>';
									}
									else{

										$html.='<option value="'.$row['role_id'].'">'.$row['role'].'</option>';
									}
								}


								$html.= '</select>
							</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Default Location<span class="required">*</span>
						</label>
							<div class="col-xs-6">
							<select class="form-control"type="text" id="location" required="required"  name="location" placeholder="location " value="" >

								<option value=""> Select Location</option>';
									foreach($Location as $row){
									if(($EmployeeInfo[0]['defaultlocation'])==$row['location_id'])
									{
										$html.='<option  value="'.$row['location_id'].'" selected = "selected"  >'.$row['location'].'</option>';
									}
									else{

										$html.='<option value="'.$row['location_id'].'">'.$row['location'].'</option>';
									}
								}


								$html.= '</select>

							</div>
					</div>

		<div class="modal-footer">
						<button type="button" id="close" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
					</div>
		</form>';
		echo json_encode($html);
	}

 public function changepassword()
	 {		$this->load->model('Dashboard_model');
			$UserId = $this->input->post('userid');
			$PrevPassword = $this->input->post('previouspassword');
			$NewPassword = $this->input->post('newpassword');

			$result = $this->Dashboard_model->UpdatePassword($UserId, $PrevPassword,$NewPassword );
			echo json_encode($result);
			//return $result;

	 }


	public function Check_MenuRights_Availability()
	{

		$menuid= $this->input->post('menuid');
		$roleid= $this->input->post('role');



		$this->load->model('menurights_model');
		$Permissioncheck= $this->menurights_model->SelectRightsbyJobroleMenuid($roleid,$menuid);
		//echo json_encode($Permissioncheck); exit;
		$message='';
		$html='';
		if($Permissioncheck==1){
			$html.=	'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">The right is alredy set for this user  <span class="required">*</span>
						</label>';
		}

		echo json_encode($html);
	}

	public function MenuRights_Edit()
	{
		$url='admin/Menurights/updatemenurights';
		$menurightsId= $this->input->post('mrnid');
		$this->load->model('menurights_model');
		$this->load->model('role_model');
		$menurightsInfo = $this->menurights_model->getmenurightsInfo($menurightsId);
		$menuresult = $this->menurights_model->selectmenu();
		$jobroleresult = $this->role_model->selectrole();


		$html='';
		$html.=	'<form id="demo-form2" action="'.base_url().$url.'" method="post" data-parsley-validate class="form-horizontal form-label-left">
		<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu<span class="required">*</span>
						</label>
							<div class="col-xs-6">
							<select class="form-control"type="text" id="menuid" required="required"  name="menuid" placeholder="Menu " value="" >
		<option value=""> Select Menu </option>';

		foreach($menuresult as $row){
		if(($menurightsInfo[0]['menu_id'])==$row['menuID'])
		{
		$html.='<option  value="'.$row['menuID'].'" selected = "selected"  >'.$row['menuname'].'</option>';
		}
		else{

		$html.='<option value="'.$row['menuID'].'">'.$row['menuname'].'</option>';
		}
		}

		$html.=	'</select>
		<input type="hidden" id="HFid" name="HFid" value="'.$menurightsInfo[0]['menurights_id'].'" />
		</div>
		</div>
<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Role<span class="required">*</span>
						</label>
							<div class="col-xs-6">
							<select class="form-control"type="text" id="role" required="required"  name="role" placeholder="Role " value="" >
		<option value=""> Select Menu </option>';

		foreach($jobroleresult as $row){
		if(($menurightsInfo[0]['role_id'])==$row['role_id'])
		{
		$html.='<option  value="'.$row['role_id'].'" selected = "selected"  >'.$row['role'].'</option>';
		}
		else{

		$html.='<option value="'.$row['role_id'].'">'.$row['role'].'</option>';
		}
		}

		$html.=	'</select>
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rights<span class="required">*</span>
		</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
		<select required class="form-control col-md-7 col-xs-12" name="rights" id="rights"  >	';

		$selected=$menurightsInfo[0]['rights'];
		$html.='<option>'.$selected.'</option>
		<option>Yes</option>
		<option>No</option>



		</select>
		</div>
		</div>



		 <div class="modal-footer">
						<button type="button" id="close" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Confirm">
					</div>
				</form>	       ';
		echo json_encode($html);
	}





}