<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--     Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add New Main Bock | IP </title>

<!--     Bootstrap -->
    <link href="../frontend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!--     Font Awesome -->
    <link href="../frontend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!--     NProgress -->
    <link href="../frontend/vendors/nprogress/nprogress.css" rel="stylesheet">
<!--     iCheck -->
    <link href="../frontend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
    <link href="../frontend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

<!--     Custom Theme Style --> 
<link href="../frontend/build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
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
                          <input type="text" id="ipAddress" name="ipAddress" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Subnet bit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="subNetBit" name="subNetBit" required="required" class="form-control col-md-7 col-xs-12">
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
                            <a href="../frontend/home.php">
                                <button class="btn btn-primary" type="button">Cancel</button></a>
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
  

         <!-- page content -->
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
    <!-- iCheck -->
    <script src="../frontend/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../frontend/vendors/moment/min/moment.min.js"></script>
    <script src="../frontend/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../frontend/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../frontend/build/js/custom.min.js"></script>
    <!--intialize datetime picker-->
    <script>
        $('#myDatepicker').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    </script>
  </body>

</html>