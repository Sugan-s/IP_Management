
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="frontend/production/images/favicon.png" type="image/ico" />
    
    <title>IP Management | Register</title>

    <!-- Bootstrap -->
    <link href="../frontend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../frontend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../frontend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../frontend/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../frontend/build/css/custom.min.css" rel="stylesheet">
    <script src="../frontend/production/js/sweetalert2.all.min.js"></script>
    <script src="../frontend/production/js/jquery.min.js"></script>
    <style>
        body  {
            background-image: url("../frontend/production/images/internet.jpg");
            background-repeat: no-repeat;
            background-color: #cccccc;
            background-size: 2560px 1440px;
            }
</style>
</head>

<!--<body class="login" background="../frontend/production/images/SLT.png">-->
<body  background="../frontend/production/images/sri-lanka-telecom.gif">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    


    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="registerCredentials.php" method="post" >
                    <h1>Register Form</h1>
                    
                    <br>
                    <div>
                        <?php
                         include '../DbConnection.php';
         $col = $db->user;
         $num=$col->count();
         $num_1=$num+1;
         $prefix="SLT_0";
         $userid=$prefix.$num_1;
         echo "<input type='text' class='form-control'name='usrid' id='usrid' required='' readonly=true value=".$userid.">";
                        ?>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="name" id="name" required="" />
                    </div>
					
					
			<div class="form-group">
                           <select class="form-control"  name="role" id="role" required="">
                            <option>Choose Role</option>
                            <option>Admin</option>
                            <option>Standard User</option>
                            <option>Editor</option>
                           
                          </select>
                        
                      </div>
					
                    <div>
                        <input type="password" data-validate-length="6,8" class="form-control" placeholder="Password" name="password" id= "password" required="" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="submit" value="submit"> Register</button>
                        <a href="../userHandling/userHandling.php"> <button class="btn btn-primary" type="button">Cancel</button> </a>
                    </div>
                    
                    <div class="clearfix"></div>

                </form>
            </section>
        </div>
    </div>
</div>
    <script src="../frontend/vendors/validator/validator.js"></script>
    
</body>
</html>



