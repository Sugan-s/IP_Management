<?php
session_start();


if (isset($_POST["submit"])) {
    include '../DbConnection.php';
    $serviceblock=filter_input(INPUT_POST, "service");
    $serviceblockipAddress=filter_input(INPUT_POST, "ipaddress");
    $cricuitid=filter_input(INPUT_POST, "circuitId");
    $des=filter_input(INPUT_POST, "description");
    $assignedDate=filter_input(INPUT_POST, "assignedDate");
    $assignBy=filter_input(INPUT_POST, "assignedBy");
    $remarks=filter_input(INPUT_POST, "remarks");
    $servicesubnetbit;
    $hostIp;
    
    $description = str_replace('_', ' ', $des);
    
    
    
    $col_deleteIPFromService = $db->$serviceblock;
    
    $splitip=explode('.', $serviceblockipAddress);
    $splitedip1=$splitip[0];
    $splitedip2=$splitip[1];
    $splitedip3=$splitip[2];
    $splitedip4=$splitip[3];
    
    //get service subnetbit
    $collections=$db->services;
    $cursor=$collections->find();
    foreach ($cursor as $doc)
    {
        if($doc['service']==$serviceblock)
        {
            $servicesubnetbit=$doc['serviceSubnetBit'];
        }
    }
    //merge ip address
    $dbname_service=$splitedip1.'.'.$splitedip2.'.'.$splitedip3.'.'.'0'.'/'.$servicesubnetbit.'-'.$serviceblock;
    //echo $dbname;
    
    $updateserviceblockaddress=$serviceblockipAddress.'/'.$servicesubnetbit;
    //echo $updateserviceblockaddress;
    //exit();
    
    //update
    $collections_service=$db->$dbname_service;
     $cursor_service=$collections_service->find();
    foreach ($cursor_service as $doc_service)
    {
        if($doc_service['serviceBlockAddress']==$updateserviceblockaddress)
        {
            $object_Id=$doc_service["_id"];
            $hostIp=$doc_service["hostIp"];
           $collections_service->updateOne(
                   array('_id' => $object_Id),
                   array (
                       '$set' => array(
                           'circuitID'=> $cricuitid,
                           'description' => $description,
                           'assignedBy' => $assignBy,
                           'assignedDate'=> $assignedDate,
                           'remarks' => $remarks
                           
                       )
                   )
                   );
        }
    }
    //delete from service table
    $cursor_delete=$col_deleteIPFromService->find();
    foreach ($cursor_delete as $doc_delete)
    {
            if($doc_delete["serviceBlockAddress"]==$serviceblockipAddress)
       {
           $objId=$doc_delete["_id"];
           
           $col_deleteIPFromService->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId ($objId )) );
          
       }
   }
   //insert search table
   $col_search= $db->searchTable;
   $insertSearchserviceblock = array(
                                'serviceBlockAddress'=>$serviceblockipAddress,
                                'circuitID'=>$cricuitid,
                                'description'=>$description,
                                'dbName'=>$dbname_service,
                                 'hostIp'=>$hostIp
                                );
   
   $col_search->insertOne($insertSearchserviceblock);
   header("Location: ../home/home.php");
}