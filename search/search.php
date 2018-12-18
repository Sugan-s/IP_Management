<?php
include '../home/content.php';
include 'searchUser.php';
$searchuser=new Search();
?>
        <!-- page content -->
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Search</h3>
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
                    <h2>Current User</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                         <tr>
                          <th>Address Block</th>
                          <!--<th>Service</th>-->
                          <th>Circuit ID</th>
                          <th>Description</th>
                          <th>Assigned Date</th>
                          <th>Assigned By</th>
                          <th>Remarks</th>
                          <?php
                           $userrole=$_SESSION['role'];
                          if($userrole=="Admin" || $userrole=="Editor")
                            {
                          ?>
                          <th>Assign</th>
                          <?php
                             }
			?>			  
                        </tr>
                      </thead>
                        <tbody>
                          <?php
                          $searchuser->currentUser();
                          ?>
                          </tbody>
                      </table>
                    </div>
		   </div>
                </div>
              </div>
                  </div>
            <!-- previous user-->
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Previous User</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                         <tr>
                          <th>Address Block</th>
                          <!--<th>Service</th>-->
                          <th>Circuit ID</th>
                          <th>Description</th>
                          <th>Assigned Date</th>
                          <th>Deleted Date</th>
                          <!--<th>Assigned By</th>-->
                          <th>Remarks</th>
                          
                          <?php
                           //$userrole=$_SESSION['role'];
//                          if($userrole=="Admin" || $userrole=="Editor")
//                            {
                          ?>
                          
                          <?php
                            // }
			?>			  
                        </tr>
                      </thead>
                        <tbody>
                          <?php
                          $searchuser->previousUser();
                          ?>
                          </tbody>
                      </table>
                    </div>
		   </div>
                </div>
              </div>
                  </div>
            
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <!--<a href="../frontend/home.php"> <button class="btn btn-primary" type="button">Cancel</button> </a>-->
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

