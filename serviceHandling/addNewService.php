<?php
include '../home/content.php';
?>
  <link href="../frontend/build/css/custom.min.css" rel="stylesheet">
 <link rel="stylesheet" href="../frontend/build/1.2.3/css/pick-a-color-1.2.3.min.css">
 <!-- page content -->
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add New Services</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form id="addMainIp" data-parsley-validate class="form-horizontal form-label-left" action="insertServices.php" method="post" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="service" name="service" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        
                       <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="styled">Styled <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="pick-a-color form-control col-md-7 col-xs-12" id="pick-a-color" value="#12e826" name="colourValues">
                        </div>
                      </div>			
                     
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subNetBit">Subnet Bit
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="subNetBit"  name="subNetBit" min="1" max="32" placeholder="Subnetbit between 1 to 32" class="form-control col-md-7 col-xs-12" onchange="myFunction()">
                        </div>
			</div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Note 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="note" name="note" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
			</div>
				
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="serviceDetails.php"> <button class="btn btn-primary" type="button">Cancel</button> </a>
				<button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
 <div class="clearfix"></div>
        <!-- /page content -->
  

        
   
 
 <?php
include '../home/footer.php';