 <?php
 session_start();
if(isset($_POST))
{
    include '../DbConnection.php';
    $userID=filter_input(INPUT_POST, "userid");
    $password=filter_input(INPUT_POST, "password");
   $col = $db->user;
   $cursor =$col->find();
   $usrname;
   $hashed_password;
   $verify;
   $flag=0;
   foreach ($cursor as $document)
   {
       if($document["usrid"]==$userID)
       {
           $usrname=$document["name"];
           $hashed_password=$document["password"];
           $role=$document["role"];
           $verify=password_verify($password, $hashed_password);
            if($verify)
           {
               $_SESSION['logged']=true;
                $_SESSION['name']=$usrname;
                $_SESSION['role']=$role;
                $flag=1;
                
                //exit();
           }
//            else {
//                    echo "alert('not loggedin')";
//                    header("Location: login.php");
//                }
//         
//       }
//       else
//       {
//           header("Location: login.php");
//       }
//      
   }
   }
    if($flag==1)
    {
       header("Location: ../home/home.php"); 
    }
 else {
        echo "<script>
            alert('Enter your valid username and password');
            window.location.href='login.php';
            </script>"; 
 }       


}