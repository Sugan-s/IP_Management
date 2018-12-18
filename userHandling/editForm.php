<?php
if (isset($_POST["submit"])) 
{
    session_start();
     $userID=filter_input(INPUT_POST, "userid");
     $userName=filter_input(INPUT_POST, "username");
     $role=filter_input(INPUT_POST, "role");
     
      include '../DbConnection.php';
      
      $sessionUserId=$_SESSION['userId'];
      $col=$db->user;
      $cursor=$col->find();
      
      foreach ($cursor as $doc)
        {
            if($doc["usrid"]==$sessionUserId)
            {
                $objId=$doc["_id"];
                $col->updateOne(
                         array('_id' => $objId),
                        array (
                                '$set' => array(
                                 'role' => $role
                                    )
                                )
                   );
            }
        }
        
        header("Location:userHandling.php");
}


