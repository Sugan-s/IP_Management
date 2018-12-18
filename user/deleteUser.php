<?php
/**
 * when delete a assigned customer
 * ***service ip block table will update.
 * ***all details will insert into deletedServiceBlock table
 * ***all details will deleted from searchTable 
 * ***deleted service block address insert into particular service table.
 * **/
session_start();
    include '../DbConnection.php';
     $serviceipAddress = $_GET['serviceblockipaddress'];
     $dbName = $_GET['name'];
     $col = $db->$dbName;
     $col_delete = $db->deletedServiceBlock;
     $col_searDelete = $db->searchTable;
     $circuitID;
     $description;
     $assignedBy;
     $assignedDate;
     $remarks;
     $hostIp;
     $deletetedDate = date("d/m/Y");
     
      $splitedip1 = explode('/', $serviceipAddress);
      $serv_add = $splitedip1[0];
     
     $splitedip = explode('-', $dbName);
     $col_serviceName = $splitedip[1];
     $col_deleteIPFromService = $db->$col_serviceName;
     
     $cursor=$col->find();
     foreach ($cursor as $doc)
    {
            if($doc["serviceBlockAddress"]==$serviceipAddress)
       {
           $circuitID=$doc["circuitID"];
           $description=$doc["description"];
           $assignedBy=$doc["assignedBy"];
           $assignedDate=$doc["assignedDate"];
           $remarks=$doc["remarks"];
           $hostIp =$doc["hostIp"]; 
       }
    }
   
   $insertServiceBlock=array(

                            'serviceBlockAddress'=>$serv_add,
                            'circuitID'=>$circuitID,
                            'description'=>$description,
                            'assignedBy'=>$assignedBy,
                            'assignedDate'=>$assignedDate,
                            'remarks'=>$remarks,
                            'deletedDate'=>$deletetedDate,
                            'service'=>$col_serviceName,
                            'hostIp'=>$hostIp
                             );
   
   $insertFreeserviceblock = array(
                                'serviceBlockAddress'=>$serv_add,
                                'dbName'=>$dbName
                                );
    $col_delete->insertOne($insertServiceBlock); 
    $col_deleteIPFromService->insertOne($insertFreeserviceblock); 
 
   $cursor=$col->find();
    foreach ($cursor as $doc)
    {
            if($doc["serviceBlockAddress"]==$serviceipAddress)
       {
           $objId=$doc["_id"];
           $col->updateOne(
                   array('_id' => $objId),
                   array (
                       '$set' => array(
                           'circuitID'=> 'null',
                           'description' => 'null',
                           'assignedBy' => 'null',
                           'assignedDate'=> 'null',
                           'remarks' => 'null',   
                       )
                   )
                   );
       }
   }
   
    $cursor1=$col_searDelete->find();
    foreach ($cursor1 as $doc)
    {
            if($doc["serviceBlockAddress"]==$serv_add)
       {
           $objId=$doc["_id"];
            $col_searDelete->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId ($objId )) );
       }
   }
   
   header("Location:../home/home.php");

