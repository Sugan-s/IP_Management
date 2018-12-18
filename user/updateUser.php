<?php
/***
 * when assigning customer for each service block
 * ***service block details will update from ip-service table
 * ***assigned service block address will delete from particular service table
 * ***assigned user details will insert into searchTable
 * 
 * ****/
session_start();
$sessionMainIp=$_SESSION['MainIp'];
$sessionsubnetIp=$_SESSION['subnetIp'];
if (isset($_POST["submit"])) {
    include '../DbConnection.php';

    $dbNa=$_SESSION['db'];
   
     //service table for assign each service block to customer
     $col = $db->$dbNa;
     $col_search= $db->searchTable;
     $splitedip = explode('-', $dbNa);
     $col_serviceName = $splitedip[1];
     //delete from particular service table
     $col_deleteIPFromService = $db->$col_serviceName;
     
    
      
    $serviceBlockAddress=filter_input(INPUT_POST, "serviceIpAddress");
    $circuitID=filter_input(INPUT_POST, "circuitId");
    $description=filter_input(INPUT_POST, "description");
    $assignedBy=filter_input(INPUT_POST, "assignedBy");
    $assignedDate=filter_input(INPUT_POST, "assignedDate");
    $remarks = filter_input(INPUT_POST, "remarks");
    $hostIP;
   
      $splitedip1 = explode('/', $serviceBlockAddress);
      $ser_ipBlock = $splitedip1[0];
     
   $cursor=$col->find();
    foreach ($cursor as $doc)
    {
            if($doc["serviceBlockAddress"]==$serviceBlockAddress)
       {
           $objId=$doc["_id"];
           $hostIP = $doc["hostIp"];
           
           $col->updateOne(
                   array('_id' => $objId),
                   array (
                       '$set' => array(
                           'circuitID'=> $circuitID,
                           'description' => $description,
                           'assignedBy' => $assignedBy,
                           'assignedDate'=> $assignedDate,
                           'remarks' => $remarks
                           
                       )
                   )
                   );
       }
   }
   $cursor1=$col_deleteIPFromService->find();
    foreach ($cursor1 as $doc)
    {
            if($doc["serviceBlockAddress"]==$ser_ipBlock)
       {
           $objId=$doc["_id"];
           
           $col_deleteIPFromService->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId ($objId )) );
          
       }
   }
   
   $cursor2=$col_search->find();
   $objId_se='null';
    foreach ($cursor2 as $doc)
    {
            if($doc["serviceBlockAddress"]==$ser_ipBlock)
       {
           $objId_se=$doc["_id"];
           $col_search->updateOne(
                   array('_id' => $objId_se),
                   array (
                       '$set' => array(
                                'serviceBlockAddress'=>$ser_ipBlock,
                                'circuitID'=>$circuitID,
                                'description'=>$description,
                                'dbName'=>$dbNa,
                                
                                
                           
                       )
                   )
                   
                   );
       }
   }
   
   if($objId_se=="null")
   {
       $insertSearchserviceblock = array(
                                'serviceBlockAddress'=>$ser_ipBlock,
                                'circuitID'=>$circuitID,
                                'description'=>$description,
                                'dbName'=>$dbNa,
                                'hostIp'=>$hostIP,
                                
           
                                );
   
   $col_search->insertOne($insertSearchserviceblock);
       
   }
   
   
  header("Location: ../subnet/subnetblock.php?subnetId=$sessionMainIp&value=$sessionsubnetIp");               
  
}

