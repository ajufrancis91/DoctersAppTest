<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

  


<script>
function popupAdd(){
	$('#modal-role-human-resources2').modal(
        {
            show: true,
           keyboard: false
        }
    );
}
function popup(id){	
	 $.ajax({
         type: "POST",
         url:  "../commondata/Role_Edit", 
         data: {expsid: id},
         dataType: "json",  
        // cache:false,
         success: 
              function(data)
				{				
					$('#modal-body').html(data);
					$('#modal-role-human-resources').modal(
						{
							show: true,
							keyboard: false
						}
					);				   
				}
          });
}
function popupDelete(id){
	$('#HFdelid').val(id);
	$('#modal-role-human-resources3').modal(
        {
            show: true,
           keyboard: false
        }
    );
	return false;
}
</script>
<!-- jQuery 3 -->




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
  Role
    
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-xs-12">
         
          <div class="box">
		  <div class="box-header">
              <h3 class="box-title"> </h3>
					<div style="text-align:right; padding:10px;display:none;">
					<a class="add-user btn btn-success" title="Add New" onClick="popupAdd()" data-toggle="modal" href="#">Add  Role</a>
              </div>
			   
			    <div class="box-header">
			  <div class="box-tools">
               
              </div>
            </div>
            <!-- /.box-header -->
         <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
             
			 
				<thead>
					<tr class="GridHeader">
						<th> Sl # </th>
						<th> Role</th>
						<th style="display:none;"></th>
   
					</tr>
				</thead>
			<tbody>
				     
                
				
				<?php
					foreach($result as $row)
					echo'<tr>
					<td> </td>
					<td> '.$row['role'].'</td>
					<td style="display:none;" ><a class="view-user btn btn-info" title="Edit" data-toggle="modal" href="#"  onClick="popup(\''.$row['role_id'].'\');"  data-userid="ADMIN"><i class="fa fa-edit"></i></a>
                    <a class="delete-user btn btn-danger" title="Delete" data-toggle="modal" href="#" onClick="popupDelete(\''.$row['role_id'].'\')" data-userid="ADMIN"><i class="fa fa-trash"></i></a>
					</td>
			   </tr>';?>
               </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>
      </div>
 <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->    


<!---------------------------------------------------------------POPUP FOR ADD--------------------------------------------------------------------------------------------------------->  

<div class="modal fade" id="modal-role-human-resources2" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add Role</h4>
			</div>
			<div class="modal-body">
				<form id="demo-form2" action="<?php echo  base_url().'admin/Role/saverole'; ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Role<span class="required">*</span>
						</label>
							<div class="col-xs-6">
								<input name="role" type="text" class="form-control" required="required" placeholder="Role" value="">
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

<!---------------------------------------------------------------POPUP FOR EDIT------------------------------------------------------------>  

<div class="modal fade" id="modal-role-human-resources" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
			
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Role </h4>
            </div>
			  <div id="modal-body" class="modal-body">                        
                      
            </div>
		</div>
	</div>
</div>


<!---------------------------------------------------------------End of EDIT POPUP---------------------------------------------------------->          


<!---------------------------------------------------------------POPUP FOR DELETE--------------------------------------------------------------------------------------------------------->  

<div class="modal fade" id="modal-role-human-resources3" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Role</h4>
			</div>
			<div class="modal-body">
				<form id="demo-form2" action="<?php echo  base_url().'admin/Role/deleterole'; ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">
                   
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

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script>
  $(document).ready(function() {
    var t = $('#example1').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>



