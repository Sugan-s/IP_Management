<?php

/* 
 * Populate combo box from another combo box
 * 
 * .
 */

$getservice=$_GET['opt'];
include '../DbConnection.php';
$collections=$db->$getservice;
$cursor=$collections->find();
$message="no values available";
foreach ($cursor as $doc)
{
    $serviceBlockAddress=$doc['serviceBlockAddress'];
    if($serviceBlockAddress=='')
    {
          echo "<option value='".$message."'>".$message."</option>";
    
    }
    elseif(!$serviceBlockAddress==""){
      echo "<option value='".$serviceBlockAddress."'>".$serviceBlockAddress."</option>";
    }
}