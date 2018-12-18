<?php
session_start();
    include '../DbConnection.php';
     $service = $_GET['service'];
     
     $col = $db->services;
     $col_mainIp = $db->mainIp;
     $col_drop = $db->$service;
     $flag = 0; 
     
     $cursor=$col_mainIp->find();
    foreach ($cursor as $doc)
    {
        $netID=$doc["networkAddress"];
        $subnetbit=$doc["subnetBit"];
        $dbname=$netID.'/'.$subnetbit;
//        
//        echo $dbname;
//        exit();
        $col_tab = $db->$dbname;
        $cursor2=$col_tab->find();
        foreach ($cursor2 as $doc2)
        {
           $servicetype = $doc2["serviceType"];
           //$cirID = "null";
           if ( (strcmp( $servicetype, h ) )== 0)
            {
                $flag = 1; 
               break;
                                                                      
            }    
        }
    }
    
    if($flag==0)
    {
        $cursor1=$col->find();
    foreach ($cursor1 as $doc1)
    {
            if($doc1["service"]==$service)
       {
           $objId=$doc1["_id"];
            $col->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId ($objId )) );
       }
   }
   
   $col_drop->drop();
   
   header("Location:serviceDetails.php");
        
    }
    else{
        echo "<script>
            alert('Some subnetwork address are assigned to this service type');
            window.location.href='serviceDetails.php';
            </script>"; 
        
    }
    
    

