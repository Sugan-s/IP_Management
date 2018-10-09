 <?php
 session_start();
if(isset($_POST))
{
    include '../DbConnection.php';
    $usrname=filter_input(INPUT_POST, "userid");
    $password=filter_input(INPUT_POST, "password");
   $db = $con->IpManagementDev;
   $col = $db->user;
   
   
   $qry=array('name'=>$usrname, 'password'=>$password);
   $result=$col->findOne($qry);
   if ($result)
   {
        $_SESSION['logged']=true;
    $_SESSION['name']=$usrname;
        header("Location: ../frontend/home.php");
        exit();
   }
 else {
       echo 'not loggedin';
   }
}

