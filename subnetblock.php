<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

    <!-- Bootstrap -->
    <link href="frontend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="frontend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="frontend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="frontend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="frontend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="frontend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="frontend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="frontend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="frontend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="frontend/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        
          <div class="">
          
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Subneted IP Addresses</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Address Block</th>
                          <th>Circuit ID</th>
                          <th>Description</th>
                          <th>Assigned Date</th>
                          <th>Assigned By</th>
                          <th>Remarks</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
						  
                        </tr>
                      </thead>
                      <tbody>

                        
                        <tr>
                         
                          <td><a>67.78.56.23/24</a></td>
                          <td>190</td>
                          <td>ABC company</td>
                          <td>2/09/2015</td>
                          <td>abc</td>
                          <td>gfhsjklx</td>
					
						  <td>
						  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            
						  </td>
						  <td>
							<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
						  </td>
                        </tr>
                       
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        <!-- /page content -->

       
      </div>
    </div>

    <!-- jQuery -->
    <script src="frontend/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="frontend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="frontend/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="frontend/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="frontend/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="frontend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="frontend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="frontend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="frontend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="frontend/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="frontend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="frontend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="frontend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="frontend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="frontend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="frontend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="frontend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="frontend/vendors/jszip/dist/jszip.min.js"></script>
    <script src="frontend/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="frontend/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="frontend/build/js/custom.min.js"></script>

  </body>
</html>