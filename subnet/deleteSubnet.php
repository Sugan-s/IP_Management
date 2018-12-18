<?php
session_start();
    include '../DbConnection.php';
     $subnetIP = $_GET['subnetworkAddress'];
     $serviceType = $_GET['serviceType'];
     $sessionMainIp=$_SESSION['MainIp'];
     $sessionsubnetIp=$_SESSION['subnetIp'];
     
//     echo $subnetIP;
//     echo $sessionMainIp;
     
    
     $col = $db->$sessionMainIp;
     $col_services = $db->services;
     $serviceSubnetBit;
     $flag = 0;
    
     
      $cursor1=$col_services->find();
      foreach ($cursor1 as $doc1)
      {
           $ser=$doc1["service"];
           if ( (strcmp( $ser, $serviceType ) )== 0  )
            {
                                               
               $serviceSubnetBit=$doc1["serviceSubnetBit"];
                
                                                                      
            }
      }
      
     
     
      $splitedip1 = explode('/', $subnetIP);
      $serv_add = $splitedip1[0];
      
      $dbName = $serv_add.'/'.$serviceSubnetBit.'-'.$serviceType;
      $col_drop = $db->$dbName;
      
      $cursor2=$col_drop->find();
      foreach ($cursor2 as $doc2)
      {
           $cir = $doc2["circuitID"];
           $cirID = "null";
           if ( (strcmp( $cir, $cirID ) )!= 0)
            {
                $flag = 1; 
               break;
                                                                      
            }
             
      }
      
     
     if($flag ==0)
     {
          
             $col_drop->drop(); 
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
                           'serviceType'=> 'FREE',
                           'serviceColor' => '#12e826',
                           'assignDate' => 'null',
                           'assignBy'=> 'null',
                           'remarks' => 'null',
                           'status'=>'null'
                       )
                   )
                   );
       }
    }
    
     header("Location:../home/home.php");

        
     }
    else 
    {
     echo "<script>
            alert('Some service block are assigned to customer');
            window.location.href='subnetblock.php?subnetId=$sessionMainIp&value=$sessionsubnetIp';
            </script>"; 
        //$col_drop->drop(); 
        
     
    }
      


