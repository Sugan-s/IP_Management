<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'vendor/autoload.php';

//connect with remote server
   $con = new MongoDB\Client("mongodb://203.94.64.80:27017");
   $db = $con->IpManagementDev;
   $col = $db->user;
   if(isset($_POST['submit']))
   {
   $insert=array(
       'userId'=>$_POST['usrid'],
       'name'=>$_POST['name'],
       'role'=>$_POST['role'],
       'password'=>$_POST['password']

   );
  $col->insertOne($insert);
  echo 'Successfully insert';
   } 
 else {
              echo 'not inserted';
}
      
 
