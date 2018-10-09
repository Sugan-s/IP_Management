<?php
  include '../DbConnection.php';
   $db = $con->IpManagementDev;
   $col = $db->services;
   if(filter_input_array(INPUT_POST))
   {
       $add=array(
            "service"=> filter_input(INPUT_POST, "service"),
             "colourValues"=>filter_input(INPUT_POST, "colourValues"),
        "note"=> filter_input(INPUT_POST, "note"),
        );
  $col->insertOne($add);
  header("Location: ../frontend/home.php");

   } 
 else {
              echo 'not inserted';
}