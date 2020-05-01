<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<style>
.form-control{
	width:95%;
}
</style>

<!-- jQuery 3 -->




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<form id="demo-form2" action="<?php echo  base_url().'admin/Patient/SaveCaseRecord'; ?>" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">
			
				
				<div class="col-xs-12">
					<h3> Case Record </h3>
				</div>
				<div class="col-xs-12">			 
					<div class="box box-primary">			 
						<div class="box-body">
							<?php 
							$status=0;
							$btnText='Save';
							$patient_name='';
							$age='';
							$complaints='';
							$health_level='';
							$appetite='';
							$thrist='';
							$bowels='';
							$contact='';
							$urine='';
							$sweat='';
							$sleet='';
							$thermal_reaction='';
							$family_history='';
							$menustrual_history='';
							$symtoms_totality='';
							$pathology='';
							$key_note='';
							$prescription='';
							if(!empty($result)){
								$patient_id=$result[0]['patient_id'];
								$patient_name=$result[0]['patient_name'];
								$age=$result[0]['age'];
								$complaints=$result[0]['complaints'];
								$health_level=$result[0]['health_level'];
								$appetite=$result[0]['appetite'];
								$thrist=$result[0]['thrist'];
								$bowels=$result[0]['bowels'];
								
								$urine=$result[0]['urine'];
								$sweat=$result[0]['sweat'];
								$sleet=$result[0]['sleet'];
								$thermal_reaction=$result[0]['thermal_reaction'];
								$family_history=$result[0]['family_history'];
								$menustrual_history=$result[0]['menustrual_history'];
								$symtoms_totality=$result[0]['symtoms_totality'];
								$pathology=$result[0]['pathology'];
								$key_note=$result[0]['key_note'];
								$prescription=$result[0]['prescription'];
								$status=1;
								$btnText='Update';
							}

						 ?>
																
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Patient Name</span>	
											<input type="text" class="form-control" name="patient_name" required="required"  placeholder="Patient Name" value="<?php echo $patient_name; ?>" />												
											<input type="hidden"  name="patient_id" value="<?php echo $patient_id; ?>" />
											<input type="hidden"  name="status" value="<?php echo $status; ?>" />
										</div>
									</div>
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Age</span>
											<input type="text" class="form-control" name="age"   placeholder="Age" value="<?php echo $age; ?>" />
										</div>
									</div>
								
																	
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Presenting Complaints</span>	
											<textarea name="complaints" class="form-control" rows="3" placeholder="Enter ..."><?php echo $complaints; ?></textarea>
										</div>
									</div>
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Level of Health</span>
											<textarea name="health_level" class="form-control" rows="3" placeholder="Enter ..."><?php echo $health_level; ?></textarea>
										</div>
									</div>
								

								<div class="col-xs-12">										
									<div class="col-xs-6">
										<div class="form-group">
											<span><b>General</b></span>	
										</div>
									</div>									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Family History</span>
										</div>
									</div>									
								</div>
								<div class="col-xs-12">	
									<div class="row">
										<div class="col-xs-6">
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Appetite</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="appetite" value="<?php echo $appetite; ?>"  placeholder="Appetite" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Thrist</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="thrist" value="<?php echo $thrist; ?>"  placeholder="Thrist" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Bowels</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="bowels" value="<?php echo $thrist; ?>"  placeholder="Bowels" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Urine</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="urine" value="<?php echo $urine; ?>" placeholder="Urine" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Sweat</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="sweat" value="<?php echo $sweat; ?>"  placeholder="Sweat" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Sleet</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="sleet" value="<?php echo $sleet; ?>" placeholder="Sleet" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Thermal Reaction</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="thermal_reaction" value="<?php echo $thermal_reaction; ?>"   placeholder="Thermal Reaction" />
												</div>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="row">
												
												<div class="col-xs-12" >
													<div class="form-group">
														
														<textarea name="family_history" class="form-control" rows="4" placeholder="Enter ..."><?php echo $family_history; ?></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												
												<div class="col-xs-12" >
													<div class="form-group">
														<span>Menustrual History</span>
														<textarea name="menustrual_history" class="form-control" rows="4" placeholder="Menustrual History"><?php echo $menustrual_history; ?></textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-6">
										<div class="form-group">
											<span>Totality of Symtoms</span>	
											<textarea name="symtoms_totality" class="form-control" rows="3" placeholder="Totality of Symtoms"><?php echo $symtoms_totality; ?></textarea>
										</div>
									</div>
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Pathology</span>
											<textarea name="pathology" class="form-control" rows="3" placeholder="Pathology"><?php echo $pathology; ?></textarea>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<span>Key note for prescribing</span>	
											<textarea name="key_note" class="form-control" rows="3" placeholder="Key note for prescribing"><?php echo $key_note; ?></textarea>
										</div>
									</div>
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Prescription</span>
											<textarea name="prescription" class="form-control" rows="3" placeholder="Enter ..."><?php echo $prescription; ?></textarea>
										</div>
									</div>
									</div>
								</div>
								
						</div>	
					</div>
				</div>
				
				<div class="col-xs-12">
					<input type="button" onclick="window.history.back();"  class="btn btn-warning" value="Back">
					<input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo $btnText; ?>">
				</div>
			</form>	
		</div>
	</section>
</div>	
 

<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


<script>
 
  
  function isNumber(evt) {
          var theEvent = evt || window.event;
          var key = theEvent.keyCode || theEvent.which;		
          key = String.fromCharCode(key);
          if (key.length == 0) return;
		  var regex = /^[0-9,.\b]+$/; 						
          if (!regex.test(key)) {
              theEvent.returnValue = false;
              if (theEvent.preventDefault) theEvent.preventDefault();
          }		  
}
  function isNumberint(evt) {
          var theEvent = evt || window.event;
          var key = theEvent.keyCode || theEvent.which;		
          key = String.fromCharCode(key);
          if (key.length == 0) return;
		  var regex = /^[0-9,\b]+$/; 						
          if (!regex.test(key)) {
              theEvent.returnValue = false;
              if (theEvent.preventDefault) theEvent.preventDefault();
          }		  
}

$(function(){
		$('.quaclass').keypress(function(event) 
		{
		var charCode = (event.which) ? event.which : event.keyCode
		if (charCode == 8 ||charCode == 9)return true;
				if (
					(charCode != 45 || $(this).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
					(charCode != 46 || $(this).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
					(charCode < 48 || charCode > 57))
					return false;
		
				return true;
		});
		
		$('.quaclassint').keypress(function(event) 
		{
		var charCode = (event.which) ? event.which : event.keyCode
		if (charCode == 8 ||charCode == 9)return true;
				if (
					(charCode != 45 || $(this).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.					
					(charCode < 48 || charCode > 57))
					return false;
		
				return true;
		});
});
</script>



