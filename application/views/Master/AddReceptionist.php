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
      Add Receptionist</h1>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<form id="demo-form2" action="<?php echo  base_url().'admin/Receptionist/SaveReceptionist'; ?>" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">
			
				<div class="col-xs-12">			 
					<div class="box box-primary">			 
						<div class="box-body">									
							<div class="col-xs-6">								
								<div class="form-group">
									<span> Name</span>
									<input type="text" class="form-control" name="name" required="required"  placeholder="Name" />
								</div>
							</div>									
							<div class="col-xs-6">									
								<div class="form-group">
									<span>Email</span>
									<input type="email" class="form-control" name="email"   placeholder="Email" required="required" />
								</div>
							</div>															
							<div class="col-xs-6">
								<div class="form-group">
									<span>Contact</span>
									<input type="text" class="form-control quaclassint" name="contact" required="required"  placeholder="Contact" />
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
					<input type="button" onclick="window.history.back();"  class="btn btn-warning" value="Back">
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


