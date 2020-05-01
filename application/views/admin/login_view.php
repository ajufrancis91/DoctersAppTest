<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>    
      <?php 
         echo link_tag('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');
    	   echo link_tag('assets/bower_components/font-awesome/css/font-awesome.min.css');
         echo link_tag('assets/bower_components/Ionicons/css/ionicons.min.css');
         echo link_tag('assets/dist/css/AdminLTE.min.css');
         echo link_tag('assets/plugins/iCheck/square/blue.css');
     ?>    
  </head>
 
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
     <b>Docter App</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

       <form action="<?php echo base_url(); ?>admin/login/getlogin" method="post">
         <div  class="form-group has-feedback" style="text-align: center;color: red;">
          <?php echo $this->session->flashdata("error"); ?>
      	 </div>
    	<div class="form-group has-feedback">	</div > 
          <div class="form-group has-feedback">    	  
            <input type="text" name="user_name"  class="form-control" placeholder="User Name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
    <div class="row">
    
      <!-- /.social-auth-links -->
      <div class="col-xs-6">
         <a onClick="popupAdd()" href="#">Forgot Password</a><br>
    	</div>
  	   <div class="col-xs-6" style="text-align:right;">
       <a style="display:none;" href="<?php echo base_url();?>admin/VendorRegistration" class="text-center">Register New Vendor</a>
      </div>
    </div>
    </div>
    <!-- /.login-box-body -->
  </div>
<!-- /.login-box -->

<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
<!-- Latest compiled JavaScript 
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

  <script src="<?php echo  base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script>
  
  function popupAdd(){
	$('#modal-location-human-resources2').modal(
        {
            show: true,
           keyboard: false
        }
    );
}
  
  
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  
</script>

<!---------------------------------------------------------------POPUP FOR ADD--------------------------------------------------------------------------------------------------------->  

<div class="modal fade" id="modal-location-human-resources2" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Forgot Password</h4>
			</div>
			<div class="modal-body">
				<form id="demo-form2" action="<?php echo  base_url().'admin/Login/ForgotPassword'; ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
						</label>
							<div class="col-xs-6">
								<input name="email" type="text" class="form-control" required="required" placeholder="email " value="">
							</div>
					</div>
                    <div class="modal-footer">
						<button type="button" id="close" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Confirm">
					</div>
				</form>	            
			</div>
		</div>
	</div>
</div>


<!---------------------------------------------------------------End of ADD POPUP---------------------------------------------------------->    

</body>
</html>