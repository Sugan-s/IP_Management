<?php
include '../DbConnection.php';
   //$db = $con->IpManagementDev;
   $col = $db->user;
//   $num=$col->count();
//        echo $num;
   $userID=filter_input(INPUT_POST, "usrid");
   $username=filter_input(INPUT_POST, "name");
   $role = filter_input(INPUT_POST, "role");
   $password = filter_input(INPUT_POST, "password");
   $hash = password_hash($password, PASSWORD_DEFAULT);
   if(filter_input_array(INPUT_POST))
   {
       $add=array(
            "usrid"=>$userID,
             "name"=>$username,
            "role"=> $role,
            "password"=>$hash,
           "status"=>1
       );
  $col->insertOne($add);
  header("Location: ../userHandling/userHandling.php");

   } 
 else {
              echo 'not inserted';
}
      
 
