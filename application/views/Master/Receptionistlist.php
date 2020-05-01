<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<style>
.form-control{
	width:95%;
}
</style>
<script>


function get_itemtype(){	
var urlid = '<?php echo base_url().'commondata/getItemType'; ?>';

var selectedcategory=$("#selcategory" ).val();
	 $.ajax({
         type: "POST",
         url:  urlid, 
         data: {catid: selectedcategory},
         dataType: "json",  
        // cache:false,
         success: 
              function(data)
				{				
					console.log(data);
					$('#itemtype').val(data[0]['stocktype']);
					$('#HFitemtype').val(data[0]['stocktype_id']);
				}
          });
}

function hidehalal(){	
	if($('#chkitemneeded').is(':checked'))
	{ $('#dvhalal').hide();	}
	else{$('#dvhalal').show();}	
}

function checkcontolled(){
	
	var control=$('#selcontroll').val();
	var serialise=$('#selserialise').val();
	
	if(control=='0')
	{ 
		$("#selserialise").val('0'); 
	}
		
}

function clearimage(){	
	if($('#chkclearimage').is(':checked'))
	{ $('input[type=file]').val('');	}
	
}

</script>
<!-- jQuery 3 -->




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Receptionists
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
			 
				<div class="box box-primary">
					<div style="text-align:right; padding:10px;">
						<a class="add-user btn btn-success" title="Add"   href="<?php echo  base_url().'admin/Receptionist/add'; ?>">Add</a>
					</div>
					<form id="demo-form2" action="" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">					
								 
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">		 
									<thead>
										<tr class="GridHeader">
											<th> Name </th>
											<th> Email</th>
											<th> Contact </th>
											<th> Address </th>
											<th style="width:15%;">  </th>
					   
										</tr>
									</thead>
									<tbody>              
								
								<?php
									foreach($result as $row)
									echo'<tr>
									<td> '.$row['name'].'</td>
									<td> '.$row['email'].'</td>
									<td> '.$row['contact'].'</td>
									<td> '.$row['address'].'</td>
									<td ><a class="view-user btn btn-info" title="Edit" data-toggle="modal" href="'.base_url().'admin/Receptionist/edit/'.$row['id'] .'"   data-userid="ADMIN"><i class="fa fa-edit"></i></a>
									<a class="view-user btn btn-warning" title="Send Mail" data-toggle="modal" href="#" onClick="popupMail(\''.$row['id'].'\')"  data-userid="ADMIN"><i class="fa fa-edit"></i></a>
									<a  class="delete-user btn btn-danger" title="Delete" data-toggle="modal" href="#" onClick="popupDelete(\''.$row['id'].'\')" data-userid="ADMIN"><i class="fa fa-trash"></i></a>
									</td>
							   </tr>';?>
							   </tbody>
							  </table>
									
							</div>   
					</form>
		
				</div>
			</div>
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

function popupDelete(id){
	$('#HFdelid').val(id);
	$('#modal-category-human-resources3').modal(
        {
            show: true,
           keyboard: false
        }
    );
	return false;
}
function popupMail(id){
	$('#HFUserId').val(id);
	$('#modal_send_mail').modal(
        {
            show: true,
           keyboard: false
        }
    );
	return false;
}

</script>

<!---------------------------------------------------------------POPUP FOR DELETE--------------------------------------------------------------------------------------------------------->  

<div class="modal fade" id="modal-category-human-resources3" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete Receptionist</h4>
			</div>
			<div class="modal-body">
				<form id="demo-form2" action="<?php echo  base_url().'admin/Receptionist/deleteReceptionist'; ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">
                   
				   <h5 style="margin-left:15%">Do you want to delete?</h5>
					<div class="form-group">
					<input type="hidden" id="HFdelid" name="HFdelid" value="" />	
					</div>	
                    

 				
					<div class="modal-footer">
						<button type="button" id="close" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Delete">
					</div>
				</form>	            
			</div>
		</div>
	</div>
</div>


<!---------------------------------------------------------------End of DELETE POPUP---------------------------------------------------------->          

<!---------------------------------------------------------------POPUP FOR SEND MAIL--------------------------------------------------------------------------------------------------------->  

<div class="modal fade" id="modal_send_mail" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Send Credentials to Receptionist</h4>
			</div>
			<div class="modal-body">
				<form id="demo-form3" action="<?php echo  base_url().'admin/Receptionist/sendmail'; ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">
                   
				   <h5 style="margin-left:15%">Send Email</h5>
					<div class="form-group">
					<input type="hidden" id="HFUserId" name="HFUserId" value="" />	
					</div>	
                    

 				
					<div class="modal-footer">
						<button type="button" id="close" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Send">
					</div>
				</form>	            
			</div>
		</div>
	</div>
</div>


<!---------------------------------------------------------------End of SEND MAIL POPUP---------------------------------------------------------->  


<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>


