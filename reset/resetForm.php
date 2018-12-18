<?php
if (isset($_POST["submit"])) 
{
  include '../DbConnection.php';
   $col = $db->user;
   $userID=filter_input(INPUT_POST, "usrid");
   $username=filter_input(INPUT_POST, "name");
   $password = filter_input(INPUT_POST, "password");
   $newpassword = filter_input(INPUT_POST, "newpassword");
   $hash = password_hash($newpassword, PASSWORD_DEFAULT);
   $hashed_password;
   $verify;
      $cursor=$col->find();
      
      foreach ($cursor as $doc)
        {
            if($doc["usrid"]==$userID)
            {
                $hashed_password=$doc["password"];
                $verify=password_verify($password, $hashed_password);
                if($verify)
                 {
                        $objId=$doc["_id"];
                        $col->updateOne(
                         array('_id' => $objId),
                         array (
                                '$set' => array(
                                 'password' => $hash
                                    )
                                )
                   );
                }
                 else 
                {
                     header("Location:reset.php"); 
                }
            }
            else 
                {
                     header("Location:reset.php"); 
                }
        }
        //echo "reset";
        header("Location:../login/login.php"); 
}




