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
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body" >
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home.html" class="site_title"><i class="fa fa-users"></i> <span>SLT</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="production/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <?php 
                 
                  if($_SESSION['logged']==true)
                   { 
                      $usr="<h2>".$_SESSION["name"]."</h2>";
                      echo $usr;
                   }
                else {
                      header("Location:../login/login.php");
                    }
                ?>
                <h2><div id="userwelcome"></div></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="home.php">Dashboard</a></li>
                        <li><a href="../service/addNewService.php">Add Service</a></li>
                        <li><a href="../mainBlock/addNewMainBlock.php">Add New Main Block</a></li>
                    </ul>
                  </li>
                  
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" id="logout1">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
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
                    <img src="production/images/user.png" alt=""><span id="username"></span>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                      <li><a href="../register/register.php"> <i class="fa fa-user-plus pull-right"></i> Add new user</a></li>
                      <li><a href="../login/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li> 
           </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col"  role="main">
         <div class="">
      		 <div class="title_left">
                <h3>IP Management Main Blog</h3>
              </div>
             
				</br>
                                
                             <div class="clearfix">
                                <div class="col-md-6 col-sm-6 col-xs-12">                              
                                    <table class="table table-bordered table-striped table-sm table-hover" style="width:720px;" name="catagory" id="catagory">
                                 <?php

                    include '../DbConnection.php';
                 try 
                    {
                        $db = $con->IpManagementDev;
                    } 
                    catch (Exception $exc) 
                    {
                         echo $exc->getTraceAsString();
                    }
//style='width:100%'
            //table load
                    
                 //$data  = "<table class='table table-bordered table-striped table-sm table-hover' style='width:1130px;' name='catagory' id='catagory'>";
                 //$data .="<col width='50'>";
          try{
              $mainip_col=$db->mainIp;
              $mainip_ob=$mainip_col->find();
              $count=0;
              foreach ($mainip_ob as $doc)
              {
                     $data = "<tbody>";
                     //$data .= "<tr >";
                     $data .="<h3>"; 
                $data .= "<h3>".$doc["networkAddress"]."/".$doc["subnetBit"]."</h3>";
                  $tbname=$doc["networkAddress"]."/".$doc["subnetBit"];
                     $col = $db->$tbname;
                $cursor = $col->find();
                $count=0;
                     foreach($cursor as $document){
                        
                         if($count %16 == 0)
                         {
                               //$data .="</tr>";
                               $data .="<tr style='width:100%'>";
                          }
                        
                            $data .= "<th style='max-width: 20px;' bgcolor=".$document["service"].">"."<a href='../subnet/subnetblock.php'>". $document["subnetworkAddress"] ."</a>"."</th>";
                           $count++;
                     }
                     $data .="</h3>";
                       $data .= "</tr>";
                     $data .= "</tbody>";
                    //$data .= "</table>";
                    
                  //$data  .= "<table class='table table-bordered table-striped table-sm table-hover' style='width:1130px;' name='catagory' id='catagory'>";
              }
      
        echo $data;
       
 
    }catch(MongoException $mongoException){
        print $mongoException;
        exit;
    }
             ?>
                                        </table>
	<!--service table-->
        <table class="table table-bordered table-sm table-hover table-default" style="width: 100px;">
	<thead>			
	<tr>			 
	<th style="width: 100px;">CATEGORY</th>
	<th style="width: 50px;">COLORS</th>	
	</tr> 
	</thead>	
	
         <?php
         include '../DbConnection.php';
         $datas  = "<tbody>";
        $datas.="<tr>";
                 try 
                    {
                        $dbs = $con->IpManagementDev;
                    } 
                    catch (Exception $exc) 
                    {
                         echo $exc->getTraceAsString();
                    }
                   try 
                    {
                        $colorTable=$dbs->services;
                        $color=$colorTable->find();
                        foreach ($color as $docs) 
                        {
                            $datas .= "<td>".$docs["service"]."</td>";
                            $datas.="<td bgcolor=".$docs["colourValues"].">"."</td>";
                            $datas.="</tr>";
                        }
                        
                        $datas .= "</tbody>";
                        echo $datas;
                    }
                    catch(MongoException $mongoException)
                    {
                        print $mongoException;
                        exit;
                    }
        ?>
         </table>
        <!--/service table-->
	</div>			
	</div>
						
</div>
</div>
        <!-- /page content -->

        <!-- footer content -->
		<footer>
          <div class="pull-right">
<!--              <a href="../addNewMainBlock.php" class="btn btn-success"><i class="fa fa-plus"></i>Add new main block</a>-->
		  </div>
		  <div class="clearfix"></div>
		  </footer>
        
		<!-- footer content -->
               
      </div>
    </div>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
   
     <script src="../frontend/main.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script src="../service/service.js"></script>
<!--    <script>
        $(function () {
    $("#catagory input[type=button]").click(function () {
         tdValue= $(this).parents('tr').find('td').eq(0).text() ;
         columnIndex = $(this).parents('tr').find('td').index(this)
         url= '../service/assignService.php'+columnIndex +'../service/assignService.php?but1='+tdValue    
        $(location).attr('href',url);
    }
});
        </script>-->
  </body>
</html>
