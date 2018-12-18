<?php
include '../home/content.php';
include 'userDetails.php';
$user=new Details();
?>
        <!-- page content -->
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Management</h3>
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
                    <h2>User Details</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                         <tr>
                          <th>User ID</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <?php
//                          if($userrole=="Admin" || $userrole=="Editor")
//                            {
                          ?>
                          <th>Edit</th>
                          <th>Delete</th>
                          <?php
                             //}
			?>			  
                        </tr>
                      </thead>
                        <tbody>
                           <?php
                           $user->UserDetails();
                          ?>
                          </tbody>
                      </table>
                    </div>
		   </div>
                </div>
              </div>
                  </div>
           
                      <div class="form-group" align="center">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="../register/register.php"> <button class="btn btn-success" type="button">Add User</button> </a>
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
  
    <?php
      include '../home/footer.php';


