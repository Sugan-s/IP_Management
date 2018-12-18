<?php
include '../home/content.php';
?>
        <!-- page content -->
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Main IP block Assignment</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form id="addMainIp" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="InsertNewIpBlock.php" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ipAddress">IP Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="ipAddress" name="ipAddress" required="required" onchange="myFunction_ip()" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Subnet bit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="subNetBit" name="subNetBit" min="1" max="32" placeholder="1 to 32" required="required" onchange="myFunction()" class="form-control col-md-7 col-xs-12">
                        </div>
               		</div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Assigned Date <span class="required">*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                        <div class='input-group date' id='myDatepicker'>
                            <input type='text'  id='assignedDate' name ='assignedDate' class="form-control col-md-7 col-xs-12" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
			</div>
                      </div>
                        
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note">Note </span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="note" name="note" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
			</div>
					
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="mainblockDetails.php"> <button class="btn btn-primary" type="button">Cancel</button> </a>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
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