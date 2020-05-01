<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php if(isset($title)){echo $title;} ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <?php echo link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <?php echo link_tag('assets/dist/css/AdminLTE.min.css'); ?>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <?php echo link_tag('assets/dist/css/skins/_all-skins.min.css'); ?>
  <!-- iCheck -->
  <?php echo link_tag('assets/plugins/iCheck/flat/blue.css'); ?>
  <!-- Morris chart -->
  <?php echo link_tag('assets/plugins/morris/morris.css'); ?>
  <!-- jvectormap -->
  <?php echo link_tag('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>
  <!-- Date Picker -->
  <?php echo link_tag('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>

  <!-- bootstrap wysihtml5 - text editor -->
 <?php echo link_tag('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ; ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  
  <style>

.GridHeader{
	background-color: #df0024;
	color:white;
}
</style>
  
  
  <!-- <script src="<?php echo  base_url('assets/bower_components/font-awesome/4.5.0/css/font-awesome.min.css') ?>"></script>
    <script src="<?php echo  base_url('assets/bower_components/ionicons.min.css') ?>"></script>  
  <script src="<?php echo  base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>"></script>
  <script src="<?php echo  base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>"></script>
  <script src="<?php echo  base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?php echo  base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo  base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo  base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo  base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<script src="<?php echo  base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
  <script src="<?php echo  base_url('assets/dist/js/adminlte.min.js') ?>"></script>
  <script src="<?php echo  base_url('assets/dist/js/demo.js') ?>"></script> -->
  
  <?php 
 // echo '<pre>';
	// print_r($this->session->userdata('UserRightsdata'));
	// exit;
	//$this->load->model("Loginmodel");
		//		 $OtherUser=$this->Loginmodel->SelectNotificationsUserType(); exit;
  ?>
  
  
  
  
        <script>
   var date = new Date();
date.setDate(date.getDate());
    $( function() {
    $( "#datepicker" ).datepicker({
		autoclose: true,
		  format: 'dd/mm/yyyy',
		  startDate: 'today'

});
  } );
  $( function() {
    $( "#datepicker1" ).datepicker({
autoclose: true
});
  } );
  </script>
  
  <style>
  .form-control { 
    font-size: 12px;
	height:26px;    
}
  </style>

  <?php	
 
$user=$this->session->userdata("id");  
if(!isset($user)){
	redirect(base_url()."admin/Login"); 
}


		$res = $this->session->flashdata(); 		
		if(!empty($res)){
		  if($res['success'][0] == "success") 
          {
              echo '<div class="alert alert-success flash" style="position:absolute; left:50%; top:3%; z-index:10000">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              '.$res['success'][1].' Added Successfully..
              </div>';
              echo '<script>
              window.setTimeout(function() {
              $(".flash").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
              });
              }, 4000);';
               echo '</script>';       
          }
		   
		   else  if($res['success'][0] == "updated") 
            {
               echo '<div class="alert alert-success flash" style="position:absolute; left:50%; top:3%; z-index:10000">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4><i class="icon fa fa-check"></i> Success!</h4>
               '.$res['success'][1].' Updated Successfully..
               </div>';
               echo '<script>
               window.setTimeout(function() {
               $(".flash").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove();
               });
               }, 2000);';
               echo '</script>';       
             }
			 
			 else  if($res['success'][0] == "cancel") 
            {
               echo '<div class="alert alert-success flash" style="position:absolute; left:50%; top:3%; z-index:10000">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4><i class="icon fa fa-check"></i> Success!</h4>
               '.$res['success'][1].' Cancelled Successfully..
               </div>';
               echo '<script>
               window.setTimeout(function() {
               $(".flash").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove();
               });
               }, 2000);';
               echo '</script>';       
             }
			 
		else  if($res['success'][0] == "deleted") 
           {
               echo '<div class="alert alert-success flash" style="position:absolute; left:50%; top:3%; z-index:10000">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4><i class="icon fa fa-check"></i> Success!</h4>
               '.$res['success'][1].' Deleted Successfully..
               </div>';
               echo '<script>
               window.setTimeout(function() {
               $(".flash").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove();
               });
               }, 2000);';
               echo '</script>';       
           }
		   else  if($res['success'][0] == "close") 
           {
               echo '<div class="alert alert-success flash" style="position:absolute; left:50%; top:3%; z-index:10000">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4><i class="icon fa fa-check"></i> Success!</h4>
               '.$res['success'][1].' Successfully..
               </div>';
               echo '<script>
               window.setTimeout(function() {
               $(".flash").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove();
               });
               }, 2000);';
               echo '</script>';       
           }
	
          else if($res['success'][0] == "error")
           {
             echo '<div class="alert alert-danger flash" style="position:absolute; left:50%; top:3%; z-index:10000">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             <h4><i class="icon fa fa-ban"></i> Error!</h4>
             Failed..
             </div>';
             echo '<script>
             window.setTimeout(function() {
             $(".flash").fadeTo(500, 0).slideUp(500, function(){
             $(this).remove();
             });
             }, 2000);';
			 echo '</script>';  
           }
		    else if($res['success'][0] == "mail")
           {
             echo '<div class="alert alert-success flash" style="position:absolute; left:50%; top:3%; z-index:10000">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4><i class="icon fa fa-check"></i> Success!</h4>
             Mail Sent Successfully
             </div>';
             echo '<script>
             window.setTimeout(function() {
             $(".flash").fadeTo(500, 0).slideUp(500, function(){
             $(this).remove();
             });
             }, 2000);';
			 echo '</script>';  
           }
		    else if($res['success'][0] == "failed")
           {
             echo '<div class="alert alert-danger flash" style="position:absolute; left:50%; top:13%; z-index:10000">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4><i class="icon fa fa-check"></i> Failed!</h4> Unable to delete '.$res['success'][1].' '. $res['success'][2].
            ' </div>';
             echo '<script>
             window.setTimeout(function() {
             $(".flash").fadeTo(3000, 0).slideUp(500, function(){
             $(this).remove();
             });
             }, 4000);';
			 echo '</script>';  
           }
		    else if($res['success'][0] == "cancelled")
           {
             echo '<div class="alert alert-danger flash" style="position:absolute; left:50%; top:13%; z-index:10000">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4><i class="icon fa fa-check"></i> Failed!</h4> Unable to cancel '.$res['success'][1].' '. $res['success'][2].
            ' </div>';
             echo '<script>
             window.setTimeout(function() {
             $(".flash").fadeTo(3000, 0).slideUp(500, function(){
             $(this).remove();
             });
             }, 4000);';
			 echo '</script>';  
           }else if($res['success'][0] == "closed")
           {
             echo '<div class="alert alert-danger flash" style="position:absolute; left:50%; top:13%; z-index:10000">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4><i class="icon fa fa-check"></i> Failed!</h4> Unable to close '.$res['success'][1].' '. $res['success'][2].
            ' </div>';
             echo '<script>
             window.setTimeout(function() {
             $(".flash").fadeTo(3000, 0).slideUp(500, function(){
             $(this).remove();
             });
             }, 4000);';
			 echo '</script>';  
           }
		     else if($res['success'][0] == "noresult")
           {
             echo '<div class="alert alert-danger flash" style="position:absolute; left:50%; top:3%; z-index:10000">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4><i class="icon fa fa-check"></i> Failed!</h4> '.$res['success'][1].' '. $res['success'][2].
            ' </div>';
             echo '<script>
             window.setTimeout(function() {
             $(".flash").fadeTo(3000, 0).slideUp(500, function(){
             $(this).remove();
             });
             }, 4000);';
			 echo '</script>';  
           }
		}	
		?>
</head>
<body class="hold-transition skin-red sidebar-mini" style="font-size:12px !important;overflow-y: hidden !important;">
<div class="wrapper">

  <header class="main-header">
  <form role="form" action="<?php echo base_url();?>admin/Mynewpage/backup" method="post" enctype="multipart/form-data">
    <!-- Logo -->
    <a href="<?php echo base_url();?>admin/Dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>V</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">DR. APP</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
			  <?php 
				 $this->load->model("Loginmodel");
				
				
				
					echo '<span class="label label-warning"></span>';
			  ?> 
			  
			  
              
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifications:</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
					
					
                  </li>
                 
                  
                </ul>
              </li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
		    
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>/uploads/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata("first_name"); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src= "<?php echo base_url();?>/uploads/img/avatar5.png" class="img-circle" alt="User Image">
				<p>
                  <?php echo $this->session->userdata("first_name");?>
                  <small><?php echo $this->session->userdata("userrole");?></small>
                </p>
                
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
				
                  <a href="<?php echo base_url()."admin/Dashboard/Profile/".$this->session->userdata('id')."";?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>admin/Login/getlogOut" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
		  </form>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>/uploads/img/avatar5.png"  class="img-circle" alt="User Image">
		  
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('first_name') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">	
			
		<?php 
    // echo'<pre>'; 
   // print_r($Smenu);exit;
   
		foreach($Smenu as $row)
                      {
						if($this->session->userdata('role')=='1'){
							$flag=1;
						}
						else{
							$flag=0;
						}
						
						foreach($this->session->userdata('MenuRightsdata') as $rightrow)
						{
							if($rightrow['menu_id']==$row['menuID'] && $rightrow['rights']=='Yes')
							{
								$flag=1;
							}
						}
		
		
		
					if($flag==1)
						{				
						
							$parent=$row['menuID'];
							if($row['parentID']==0)
							{
							echo '<li class="treeview'; 
							if($row['menuID']==$parentname){ echo ' active';}
							echo '"><a href="javascript:void(0);">
									<i class="fa fa-'.$row['icon'].'"></i>';
							echo '<span>'.$row['menuname'].'</span>' ; 							
									echo '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>';								
							echo '</a>';
							}		
							echo '<ul class="treeview-menu">';
							foreach($Smenu as $row)
							{
								if($this->session->userdata('role')=='1'){
									$flag=1;
								}
								else{
									$flag=0;
								}
								foreach($this->session->userdata('MenuRightsdata') as $rightrow)
								{
									if($rightrow['menu_id']==$row['menuID'] && $rightrow['rights']=='Yes' )
									{
										$flag=1;
									}
								}
								if($flag==1)
								{
								
									if($row['parentID']==$parent)
									{	
										$url=  base_url('admin/'.$row['Page']);								   
										echo '<li class="' ;
										if($row['Page']==$page){ echo 'active';}
										echo '" ><a href="'.$url.'" style="font-size: 12px;"><i  class="fa fa-circle-o"></i>'.$row['menuname'].'</a></li>';
									}	
																
								}
								   
							}
							echo '</ul>';
							if($row['parentID']==0){						   
							echo '</li>'; 
							}
						}		
					}
		?>
       
		
        
        
        
        
        
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>