 <?php
    include '../home/content.php';
    include 'subnetblockGenerate.php';
     $subnetIpBlock=new SubnetBlock();
    
   ?>

        
                     <div class="right_col"  role="main">
                <div class="x_panel">
                 
                    <!--tap-->
                     <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active" id="tab1"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Subnet Block</a>
                          </li>
                          <li role="presentation" class="disabled" id="tab2"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Service Block</a>
                          </li>
                          </ul>
                        <div id="myTabContent" class="tab-content">
                            
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Subnet Block</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr>
                          <th>Address Block</th>
                          <th>Category</th>
                          <th>Assigned Date</th>
                          <th>Assigned By</th>
                          <th>Remarks</th>
                           <th>Status</th>
                           <?php
                          
                           $userrole=$_SESSION['role'];
                          
                            if($userrole=="Admin" || $userrole=="Editor" )
                            {
                           ?>
                           <th>Assign</th>
                           <th>Delete</th>
                          <th>Edit</th>
                          <?php
                            }
                            ?>
						  
                        </tr>
                      </thead>
                        <tbody>
                           <?php
                               $subnetIpBlock->subnetIpDetails();
                             ?>
                          </tbody>
                      </table>
                    </div>
		    </div>
                </div>
              </div>
                           </div>
                           
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <?php
                      $serviceblocktype=$_SESSION['servicetype'];
                      $service=str_replace('_', ' ', $serviceblocktype);
                      $name="Service Block";
                      echo "<h2>".$service." "."-"." ".$name."</h2>";
                      ?>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                         <tr>
                          <th>Address Block</th>
                          <th>Circuit ID</th>
                          <th>Description</th>
						  <th>Assigned By</th>
                          <th>Assigned Date</th>
                          
                          <th>Remarks</th>
                          <?php
                          if($userrole=="Admin" || $userrole=="Editor")
                            {
                          ?>
                          <th>Edit</th>
                          <th>Delete</th>
                          <?php
                             }
							?>			  
                        </tr>
                      </thead>
                        <tbody>
                           <?php
                                include 'serviceBlockTable.php';
                                $serBlock=new ServiceBlockTable();
                                $serBlock->load_serviceTable();
                          ?>
                          </tbody>
                      </table>
                    </div>
				    </div>
                </div>
              </div>
                              <div class="form-group" align="right" >
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href='../print/printView.php'  class="btn btn-success" type = 'button'> <i class='fa fa-print'></i> Print view </a>
                        </div>
                      </div>
                          </div>
                        
                    
                </div>
              </div>
            </div>
          </div>
        
        
   <?php
             include '../home/footer.php';