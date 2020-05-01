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
			<form id="demo-form2" action="<?php echo  base_url().'admin/Patient/UpdatePatient'; ?>" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">
			
				<div class="col-xs-12">			 
					<div class="box box-primary">			 
						<div class="box-body">
									<?php 
										if(!empty($result)){
											$patient_id=$result[0]['patient_id'];
											$patient_name=$result[0]['patient_name'];
											$op_no=$result[0]['op_no'];
											$contact=$result[0]['contact'];
											$address=$result[0]['address'];
										}
									 ?>														
									
									<div class="col-xs-6">								
										<div class="form-group">
											<span>Patient Name</span>
											<input type="text" class="form-control" name="patient_name" required="required"  placeholder="Patient Name" value="<?php echo $patient_name; ?>" />
											<input type="hidden" name="patient_id"  value="<?php echo $patient_id; ?>" />
										</div>
									</div>
									
									<div class="col-xs-6">									
										<div class="form-group">
											<span>OP Number</span>
											<input type="text" class="form-control" name="op_no"   placeholder="OP Number" value="<?php echo $op_no; ?>" />
										</div>
									</div>
								
																	
									<div class="col-xs-6">
										<div class="form-group">
											<span>Contact</span>
											<input type="text" class="form-control" name="contact" required="required"  placeholder="Contact" value="<?php echo $contact; ?>" />
										</div>
									</div>									
									<div class="col-xs-6">
										<div class="form-group">
											<span>Address</span>
											<textarea class="form-control" name="address" rows="3" placeholder="Enter ..."><?php echo $address; ?></textarea>
										</div>
									</div>
									<div class="col-xs-10">

									</div>
									<div class="col-xs-2">
										<a class="add-user btn btn-success" title="Add"   href="<?php echo  base_url().'admin/Patient/caseRecord/'.$patient_id; ?>">Case Record</a>
									</div>
									
								
								
						</div>	
					</div>
				</div>
				
				
				<div class="col-xs-12">
					<input type="button" onclick="window.history.back();"  class="btn btn-warning" value="Back">
					<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">

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



