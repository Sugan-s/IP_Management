<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../DbConnection.php';
   $db = $con->IpManagementDev;
   $col = $db->user;
   if(filter_input_array(INPUT_POST))
   {
       $add=array(
            "usrid"=> filter_input(INPUT_POST, "usrid"),
             "name"=>filter_input(INPUT_POST, "name"),
        "role"=> filter_input(INPUT_POST, "role"),
       "password"=> filter_input(INPUT_POST, "password")
       );
  $col->insertOne($add);
  header("Location: ../frontend/home.php");

   } 
 else {
              echo 'not inserted';
}
      
 
