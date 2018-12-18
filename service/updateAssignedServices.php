<?php
include '../home/content.php';
$sessionMainIp=$_SESSION['MainIp'];
$sessionsubnetIp=$_SESSION['subnetIp'];

include 'status.php';
$status_up=new Status();
 ?>
        <!-- page content -->
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Services</h3>
              </div>
              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="updateStatus.php" method="POST">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subnetworkAddress">IP Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php 
                                    $status_up->fill_ipaddress();
                                ?>
                        </div>
                      </div>
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<!--                            <select class="form-control col-md-7 col-xs-12" name="service" id="service" onchange="getText(this)" disabled >
                                <option value=" ">Choose option</option>-->
                                <?php 
                                    $status_up->fill_service();
                                    
                                ?>
                          <!--</select>-->
                        </div>
                      </div>
                    	  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Assigned Date <span class="required">*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                        <div class='input-group date' id='myDatepicker'>
                             <?php 
                                    $status_up->fill_date();
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
                                    $status_up->fill_by();
                                ?>
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label for="remarks" class="control-label col-md-3 col-sm-3 col-xs-12">Remarks</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <?php 
                                    $status_up->fill_remarks();
                                ?>
                        </div>
                         </div>
                        
                        <div class="form-group">
                        <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           
                            <select class="form-control col-md-7 col-xs-12" name="status" id="status" onchange="getTextstatus(this)"  >
<!--                                <option value="NONE">NONE</option>
                                <option value="RESERVE">RESERVE</option>
                                <option value="BLOCK">BLOCK</option>-->
                                <?php 
                                    $status_up->fill_status();
                                    $status_up->load_combo_status();
                                ?>
                          </select>
                        </div>
                         </div>
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <?php
                              $status_up->cancelBtn();
                           ?>
				
                            <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" id="submit" name="submit" >Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          
            
          </div>
        </div>
            <?php
                       include '../home/footer.php';
