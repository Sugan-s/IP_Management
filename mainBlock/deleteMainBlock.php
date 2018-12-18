<?php
session_start();
    include '../DbConnection.php';
     $networkAddress = $_GET['ip'];
     $subnetbit = $_GET['bit'];
     $flag = 0;
     
     $col = $db->mainIp;
     $dbname = $networkAddress.'/'.$subnetbit;
     
     $col_drop = $db->$dbname;
     
      $cursor2=$col_drop->find();
      foreach ($cursor2 as $doc2)
      {
           $serviceType = $doc2["serviceType"];
           $servType = "FREE";
           if ( (strcmp( $serviceType, $servType ) )!= 0)
            {
                $flag = 1; 
               break;
                                                                      
            }
             
      }
      
     
     if($flag ==0)
     {
          
    $cursor1=$col->find();
    foreach ($cursor1 as $doc)
    {
            if($doc["networkAddress"]==$networkAddress)
       {
           $objId=$doc["_id"];
            $col->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId ($objId )) );
       }
   }
   
   $col_drop->drop();
          
 
    
      header("Location:mainblockDetails.php");

        
     }
    else 
    {
     echo "<script>
            alert('Some subnetwork address are assigned to service');
            window.location.href='mainblockDetails.php';
            </script>"; 
     
    }
    
    
  

