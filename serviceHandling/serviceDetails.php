<?php
include '../home/content.php';
include 'serviceHandling.php';
$servicedetails=new Category();
?>

        <!-- page content -->
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Category Management</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form id="search" data-parsley-validate class="form-horizontal form-label-left" action="searchUser.php" >
                   <!-- current user-->     
                <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Service Details</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                         <tr>
                          <th>Category</th>
                          <th>Color</th>
                          <th>Subnet Bit</th>
                          <th>Note</th>
                          <?php
//                          if($userrole=="Admin" || $userrole=="Editor")
//                            {
                          ?>
                          <th>Delete</th>
                          <?php
                             //}
			?>			  
                        </tr>
                      </thead>
                        <tbody>
                           <?php
                           $servicedetails->CategoryDetails();
                          ?>
                          </tbody>
                      </table>
                    </div>
		   </div>
                </div>
              </div>
                  </div>
           
                      <div class="form-group" align="right" >
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <a href="addNewService.php"> <button class="btn btn-success" type="button">Add New Category</button> </a>
                        </div>
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
  

       
<script>
    function ConfirmDelete()
    {
      return confirm("Are you sure you want to delete?");
      //if (x==true)
      //{
         // return true;
          //swal("record deleted");
          //window.location.href="../serviceHandling/deleteService.php?service="+value;
     // }
              //window.location.href="serviceDetails.php";
  // else
   //{
     // swal("record not deleted");
     // window.location.href="serviceDetails.php";
   //}
   
    //return x;
    
    //sweet alert
//    const swalWithBootstrapButtons = swal.mixin({
//  confirmButtonClass: 'btn btn-success',
//  cancelButtonClass: 'btn btn-danger',
//  timer: 2000,
//  buttonsStyling: false,
//})
//
//swalWithBootstrapButtons({
//  title: 'Are you sure?',
//  text: "You won't be able to revert this!",
//  type: 'warning',
//  timer: 2000,
//  showCancelButton: true,
//  confirmButtonText: 'Yes, delete it!',
//  cancelButtonText: 'No, cancel!',
//  reverseButtons: true
//}).then((result) => {
//  if (result.value) {
//    swalWithBootstrapButtons(
//      'Deleted!',
//      'Your file has been deleted.',
//      'success'
//    )
//  } else if (
//    // Read more about handling dismissals
//    result.dismiss === swal.DismissReason.cancel
//  ) {
//    swalWithBootstrapButtons(
//      'Cancelled',
//      'Your imaginary file is safe :)',
//      'error'
//    )
//  }
//})
    }
</script>

 <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
<?php
                  include '../home/footer.php';


