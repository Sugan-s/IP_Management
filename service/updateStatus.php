<?php
session_start();
if (isset($_POST["submit"])) {
    include '../DbConnection.php';
    $sessionMainIp=$_SESSION['MainIp']; //subnetId
    $sessionsubnetIp=$_SESSION['subnetIp'];  //value
     $col = $db->$sessionMainIp;
    $col_service=$db->services;
    $color='';
    $ip=filter_input(INPUT_POST, "subnetworkAddress");
    $serviceType=filter_input(INPUT_POST, "service");
    $assignDate=filter_input(INPUT_POST, "assignDate");
    $assignBy=filter_input(INPUT_POST, "assignedBy");
    $remarks = filter_input(INPUT_POST, "remarks");
    $status = filter_input(INPUT_POST, "status");
     $cursor=$col_service->find();
     foreach ($cursor as $doc)
    {
            if($doc["service"]==$serviceType)
       {
           $color=$doc["colourValues"];
       }
   }
   
   $cursor=$col->find();
    foreach ($cursor as $doc)
    {
            if($doc["subnetworkAddress"]==$sessionsubnetIp)
       {
           $objId=$doc["_id"];
           $col->updateOne(
                   array('_id' => $objId),
                   array (
                       '$set' => array(
                           'serviceType'=> $serviceType,
                           'serviceColor' => $color,
                           'assignDate' => $assignDate,
                           'assignBy'=> $assignBy,
                           'remarks' => $remarks,
                           'status'=>$status
                       )
                   )
                   );
       }
   }
   
   header("Location:../home/home.php");
}


