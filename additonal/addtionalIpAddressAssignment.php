<?php
include '../home/content.php';
include 'additionalIp.php';
$add=new AdditionalIp();
?>
        <!-- page content -->
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Additional IP Address Assignment</h3>
              </div>

             
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="insertAddtionalIp.php" method="POST">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service" name="service" id="service">Service <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="service" id="service" onchange="update(this.value)" >
                           <?php
                           //$add->fill_combobox();
                           $add->load_combobox();
                           
                           ?>
                           </select>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">IP Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="ipaddress" id="ipaddress"  >
                            
                          </select>
                        </div>
                      </div>
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="circuitId">Circuit ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $add->fill_circuitID();
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php
                            $add->fill_description();
                            ?>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Assigned Date <span class="required">*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                        <div class='input-group date' id='myDatepicker'>
                            <input type='text' name="assignedDate"  id="assignedDate"class="form-control col-md-7 col-xs-12" />
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
                          $add->fill_by();
                          ?>
                        </div>
                      </div>
                        
			 <div class="form-group">
                        <label for="remarks" class="control-label col-md-3 col-sm-3 col-xs-12">Remarks</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="remarks" class="form-control col-md-7 col-xs-12" type="text" name="remarks" id="remarks">
                        </div>
                      </div>
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <?php
                           $add->cancel_btn();
                           ?>
<!--						  <button class="btn btn-primary" type="reset">Reset</button>-->
        <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
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

