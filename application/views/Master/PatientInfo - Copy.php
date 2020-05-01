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
    <section class="content-header">
      <h1>
      Patient Details </h1>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<form id="demo-form2" action="<?php echo  base_url().'admin/Patient/SavePatient'; ?>" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">
			
				<div class="col-xs-12">			 
					<div class="box box-primary">			 
						<div class="box-body">
							
																	
									
									<div class="col-xs-6">								
										<div class="form-group">
											<span>Patient Name</span>
											<input type="text" class="form-control" name="patient_name" required="required"  placeholder="Patient Name" />
										</div>
									</div>
									
									<div class="col-xs-6">									
										<div class="form-group">
											<span>OP Number</span>
											<input type="text" class="form-control" name="op_no"   placeholder="OP Number" />
										</div>
									</div>
								
																	
									<div class="col-xs-6">
										<div class="form-group">
											<span>Contact</span>
											<input type="text" class="form-control" name="contact" required="required"  placeholder="Contact" />
										</div>
									</div>									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Address</span>
											<textarea class="form-control" name="address" rows="3" placeholder="Enter ..."></textarea>
										</div>
									</div>
								
								
						</div>	
					</div>
				</div>
				<div class="col-xs-12">
					<h3> Case Record </h3>
				</div>
				<div class="col-xs-12">			 
					<div class="box box-primary">			 
						<div class="box-body">
							
																
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Patient Name</span>	
											<input type="text" class="form-control" name="descriptionshort" required="required"  placeholder="Patient Name" />
										</div>
									</div>
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Age</span>
											<input type="text" class="form-control" name="age"   placeholder="Age" />
										</div>
									</div>
								
																	
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Presenting Complaints</span>	
											<textarea name="complaints" class="form-control" rows="3" placeholder="Enter ..."></textarea>
										</div>
									</div>
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Level of Health</span>
											<textarea name="health_level" class="form-control" rows="3" placeholder="Enter ..."></textarea>
										</div>
									</div>
								

								<div class="col-xs-12">										
									<div class="col-xs-6">
										<div class="form-group">
											<span>General</span>	
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
													<input type="text" class="form-control" name="appetite"   placeholder="Appetite" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Thrist</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="thrist"   placeholder="Thrist" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Bowels</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="bowels"   placeholder="Bowels" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Urine</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="urine"  placeholder="Urine" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Sweat</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="sweat"  placeholder="Sweat" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Sleet</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="sleet"  placeholder="Sleet" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-4">
													<div class="form-group">
														<span>Thermal Reaction</span>
													</div>
												</div>
												<div class="col-xs-8" style="padding-left: 5px;padding-right: 0px;">
													<input type="text" class="form-control" name="thermal_reaction" required="required"  placeholder="Thermal Reaction" />
												</div>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="row">
												
												<div class="col-xs-12" >
													<div class="form-group">
														
														<textarea name="family_history" class="form-control" rows="4" placeholder="Enter ..."></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												
												<div class="col-xs-12" >
													<div class="form-group">
														<span>Menustrual History</span>
														<textarea name="menustrual_history" class="form-control" rows="4" placeholder="Menustrual History"></textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-6">
										<div class="form-group">
											<span>Totality of Symtoms</span>	
											<textarea name="symtoms_totality" class="form-control" rows="3" placeholder="Totality of Symtoms"></textarea>
										</div>
									</div>
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Pathology</span>
											<textarea name="pathology" class="form-control" rows="3" placeholder="Pathology"></textarea>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<span>Key note for prescribing</span>	
											<textarea name="key_note" class="form-control" rows="3" placeholder="Key note for prescribing"></textarea>
										</div>
									</div>
									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Prescription</span>
											<textarea name="prescription" class="form-control" rows="3" placeholder="Enter ..."></textarea>
										</div>
									</div>
									</div>
								</div>
								
						</div>	
					</div>
				</div>
				
				<div class="col-xs-12">
									<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
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



