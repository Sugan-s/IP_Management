<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="frontend/production/images/favicon.png" type="image/ico" />
    
    <title>IP Management | Reset</title>

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
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="resetForm.php" method="post">
                    <h1>Reset Form</h1>
                    
                    <br>
                    <div>
                        <input type="text" class="form-control" placeholder="User ID" name="usrid" id="usrid" required="" />
                    </div>
                    
                    <div>
                         <input type="text" class="form-control" placeholder="User Name" name="name" id="name" required="" />
                    </div>
					
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" id= "password" required="" />
                    </div>
                    
                    <div>
                        <input type="password" class="form-control" placeholder="New Password" name="newpassword" id= "newpassword" required="" />
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-success" name="submit" value="submit"> Submit</button>
                         <a href="../frontend/home.php"> <button class="btn btn-primary" type="button">Cancel</button> </a>
                    </div>
                    
                    <div class="clearfix"></div>

                </form>
            </section>
        </div>
    </div>
</div>

</body>
</html>




