<?php
include '../home/content.php';
$sessionMainIp=$_SESSION['MainIp'];
$sessionsubnetIp=$_SESSION['subnetIp'];
$dbName = $_GET['name'];
$_SESSION['db']=$dbName;
include 'user.php';
$ser=new User();

 ?>

   
 
        <!-- page content -->
		<div class="right_col"  role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>IP Address Assignment</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"   action="updateUser.php" method="POST">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="serviceIpAddress">IP Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php 
                                    $ser->fill_ipaddress();
                                ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="circuitId">Circuit ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php 
                                    $ser->fill_circuitId();
                                ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php 
                                    $ser->fill_description();
                                ?>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Assigned Date <span class="required">*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                   
                    
                        <div class='input-group date' id='myDatepicker'>
                           <?php 
                                    $ser->fill_date();
                                ?>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    
						</div>

                      </div>
					  <div class="form-group">
                        <label for="assignedBy" class="control-label col-md-3 col-sm-3 col-xs-12">Assigned By</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php 
                                    $ser->fill_by();
                                ?>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="remarks" class="control-label col-md-3 col-sm-3 col-xs-12">Remarks</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?php 
                                    $ser->fill_remarks();
                                ?>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php
                              $ser->cancelBtn();
                           ?>
				
<!--						  <button class="btn btn-primary" type="reset">Reset</button>-->
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
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

