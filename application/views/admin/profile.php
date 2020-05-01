 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

function PopupShowPassword(){
	$('#modal-employee-human-resources2').modal(
        {
            show: true,
           keyboard: false
        }
    );
}



function ChangePassword(){
	var loginUrl = "<?php echo base_url().'commondata/changepassword'; ?>";
	var previouspassword = $('#previouspassword').val(); 
	var newpassword = $('#newpassword').val(); 
	var confirmpassword = $('#confirmpassword').val(); 
	$('#alertdiv').html('');
	if(previouspassword=='')
	{
		$('#alertdiv').html('<label style="width:100%;text-align:center;" class="alert alert-danger">Please Enter Previous Password </label>');
		$('#previouspassword').focus();
	}
	else if(newpassword=='')
	{
		$('#alertdiv').html('<label style="width:100%;text-align:center;" class="alert alert-danger">Please Enter New Password </label>');
		$('#newpassword').focus();
	}
	else if(newpassword!=confirmpassword)
	{
		$('#alertdiv').html('<label style="width:100%;text-align:center;" class="alert alert-danger">Password - Confirm password mismatch </label>');
		$('#newpassword').focus();
	}
	else{
		 $.ajax({
         type: "POST",
         url:  loginUrl, 
          data: { 
				userid: $('#HFid').val(), 
				previouspassword: $('#previouspassword').val(),
				newpassword: $('#newpassword').val()
				},
         dataType: "json",  
        // cache:false,
         success: 
              function(data)
				{	console.log(data);
					if(data==1)	{
						$('#alertdiv').html('<label style="width:100%;text-align:center;" class="alert alert-success">Password Updated Successfully</label>');
					}				
					if(data==2)	{
						$('#alertdiv').html('<label style="width:100%;text-align:center;" class="alert alert-danger">Incorrect Password</label>');
					}				   
				}
          });
	}
	
}
</script>




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
  My Profile
    
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-xs-12">
         
          <div class="box">
		  <div class="box-header">
              <h3 class="box-title"> </h3>
					<div style="text-align:right; padding:10px;">
					
              </div>
			
		 <?php
	
			echo'	<div class="row">
			<div class="col-sm-2"><img title="profile image" class="img-circle img-responsive" src="'.base_url().'uploads/img/avatar5.png"></div>
			<div class="col-sm-10">
				<h1>'.$result[0]['name'].' </h1>
				<h3>'.$result[0]['username'].'<h3>
			</div>
		</div>   
			  <br />  
			
   <div class="col-sm-4"><!--left col-->
			  <ul class="list-group">
				<li class="list-group-item text-muted">Profile</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Full Name</strong></span>'.$result[0]['name'].' </li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Role</strong></span>'.$result[0]['role'].'</li>
			  </ul>
			  <ul class="list-group">
				<li class="list-group-item text-muted">Info</i></li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Username</strong></span>'.$result[0]['username'].'</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span>'.$result[0]['email'].'</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Phone</strong></span>'.$result[0]['contact'].'</li>
			
			  </ul>
			</div>';
			?>
			
			<!--/col-4-->
            <!-- /.box-body -->
    
		<div class="col-sm-8">
			  <ul class="nav nav-tabs" id="myTab">
				
				<li class="active"><a href="#settings" data-toggle="tab">Update</a></li>
			  </ul>
			  <div class="tab-content">
				
				 <div class="tab-pane active"  id="settings">
					     <form class="form" action=" <?php echo base_url().'admin/Dashboard/UpdateProfile'?>" method="post" id="registrationForm">
						  <?php 
							echo'
							<div class="form-group">
							  <div class="col-xs-6">
								  <label for="name"><h4>Name</h4></label>
								  <input class="form-control" name="name" id="name" placeholder="first name" title="enter your first name if any." type="text" value="'.$result[0]['name'].'">
									<input type="hidden" id="HFid" name="HFid" value="'.$result[0]['id'].'" />
							  </div>
						  </div>
						  
						 
						  <div class="form-group">
							  <div class="col-xs-6">
								  <label for="email"><h4>Email</h4></label>
								  <input class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." type="email" value="'.$result[0]['email'].'">
							  </div>
						  </div>
						 
						  <div class="form-group">
							  <div class="col-xs-6">
								 <label for="mobile"><h4>Phone</h4></label>
								  <input class="form-control" name="contact" id="phone" placeholder="enter phone number" title="enter your phone number if any." type="text" value="'.$result[0]['contact'].'">
							  </div>
						  </div>
						   <div class="form-group">
							  <div class="col-xs-6">
								 <label for="address"><h4>Phone</h4></label>
								  
								  <textarea class="form-control" name="address" rows="3" placeholder="Enter ...">'.$result[0]['address'].'</textarea>
							  </div>
						  </div>
						 <div class="form-group">
													
								<div class="col-md-6 col-sm-6 col-xs-12">
									<label  for="first-name"><h4>Change Password </h4><span class="required"></span>
								</label>
									<a href="#" onClick="PopupShowPassword()" class="btn btn-warning btn-stroke"><i class="fa fa-key"></i> Change</a>			
								</div>
							</div>
						  <div class="form-group">
							   <div class="col-xs-12">
									<br>
									<button class="btn btn-lg btn-success" type="submit" name="update"><i class="fa fa-check"></i> Save</button>	
								</div>
						  </div>
					</form>
				  
				  </div><!--/tab-pane-->
			  </div><!--/tab-content-->
			</div>  ';?>
	  
	  </div>
        </div>
          <!-- /.box -->
        </div>
      </div>
      </section>
	  </div>
	  <!--------------------------------------------------------------------------------->
	  
   <div class="modal fade" id="modal-employee-human-resources2" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Password </h4>
			</div>
          <div class="modal-body">                 
					
					<div class="col-md-12 col-sm-12 col-xs-12">
							<div id="alertdiv"> </div>
						</div>	
					
					<div class="form-horizontal form-label-left">
                    <div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Previous Password<span class="required">*</span>
						</label>
						<div class="col-xs-6">
							<input type="password" id="previouspassword" name="previouspassword"  value="" class="form-control"  />
							
						</div>
                    </div>
                    
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">New Password<span class="required">*</span>
						</label>
						<div class="col-xs-6">
							<input type="password" id="newpassword" name="newpassword"  value="" class="form-control" required="required" />							
						</div>						
                    </div>
					
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Confirm Password<span class="required">*</span>
						</label>
						<div class="col-xs-6">
							<input type="password" id="confirmpassword" name="confirmpassword"  value="" class="form-control" />							
						</div>						
                    </div>
					
					
                    <div class="modal-footer">
						<button type="button" id="close" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<input type="submit" name="submit" id="submit"  onClick="ChangePassword()" class="btn btn-primary" value="Confirm">
					</div>
                </div>
            </div>
        </div>
    </div>
</div>