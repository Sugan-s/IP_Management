<?php
session_start();// Right at the top of your script
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="production/images/Sri_Lanka_Telecom_logo.svg" type="image/ico" />

    <title>IP Management | Home </title>

    <!-- Bootstrap -->
    <link href="../frontend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../frontend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../frontend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../frontend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../frontend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../frontend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../frontend/build/1.2.3/css/pick-a-color-1.2.3.min.css">
    <!-- JQVMap -->
    <link href="../frontend/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../frontend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../frontend/build/css/custom.min.css" rel="stylesheet">
    <link href="../frontend/build/css/custom.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../frontend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../frontend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../frontend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../frontend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../frontend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
     <!-- bootstrap-datetimepicker -->
    <link href="../frontend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body" >
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="home.php" class="site_title"><span>Sri Lanka Telecom</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                  <img src="../frontend/production/images/SLT.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <?php 
                 $userrole=$_SESSION['role'];
                  if($_SESSION['logged']==true)
                   { 
                      $usr="<h2>".$_SESSION["name"]."</h2>";
                      echo $usr." "."as"." ".$userrole;
                   }
                else {
                      header("Location:../login/login.php");
                    }
                ?>
                <h2>
                    <div id="userwelcome">
                    </div>
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                        <li><a id="home" href="../home/home.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a id="addnewservice_1"  href="../search/searchForm.php" ><i class="fa fa-search"></i>Search</a></li>
                        <?php
                        
                        if($userrole=="Admin")
                        {
                        ?>
                        <li><a id="addnewservice_1"  href="../serviceHandling/serviceDetails.php" ><i class="fa fa-gear"></i>Category Management</a></li>
                        <li><a href="../userHandling/userHandling.php" ><i class="fa fa-user"></i>User Management</a></li>
                        <li><a href="../mainBlock/mainblockDetails.php" ><i class="fa fa-info"></i>IP Address Block Management</a></li>
                        <?php
                        }
                        ?>
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">

            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav" >
          <div class="nav_menu">
            <nav>
             <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="../frontend/production/images/user.png" alt=""><span id="username"></span>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href="../login/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li> 
           </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
       
      		 
             			
       

