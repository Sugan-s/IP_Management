<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> New Service Assignment | Ip </title>

    <!-- Bootstrap -->
    <link href="../frontend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../frontend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../frontend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../frontend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../frontend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../frontend/vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../frontend/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../frontend/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../frontend/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../frontend/vendors/cropper/dist/cropper.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../frontend/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    
      <div class="main_container">
        
        <!-- page content -->
        <div class="right_col" role="main">
          
		  <!-- form color picker -->
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Service Assignment</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="insertServices.php" method="post">

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="service" name="service" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Styled</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group demo2">
                              <input type="text" value="#12e826" name="colourValues" class="form-control" />
                            <span class="input-group-addon"><i></i></span>
                          </div>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Note </span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="note" name="note" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
					
					</div>
					
					<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="../frontend/home.php"> 
                                <button class="btn btn-primary" type="button">Cancel</button></a>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      
                      

                    </form>
                  </div>
                </div>
              </div>
              <!-- /form color picker -->




             

                <!-- image cropping -->
                <div class="container cropper">
                 
                  <div class="row">
                    <div class="col-md-9 docs-buttons">
                      <!-- <h3 class="page-header">Toolbar:</h3> -->
                      

                      <!-- Show the cropped image in modal -->
                      <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.png">Download</a>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.modal -->

                      
                    <div class="col-md-3 docs-toggles">
                      
                  </div>
                </div>
                <!-- /image cropping -->
             
          </div>
        </div>
        <!-- /page content -->

        
      </div>
    </div>

    <!-- jQuery -->
    <script src="../frontend/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../frontend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../frontend/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../frontend/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../frontend/vendors/moment/min/moment.min.js"></script>
    <script src="../frontend/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../frontend/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../frontend/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../frontend/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../frontend/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../frontend/vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="../frontend/vendors/cropper/dist/cropper.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../frontend/build/js/custom.min.js"></script>
    
    <!-- Initialize datetimepicker -->

  </body>
</html>
