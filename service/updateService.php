<?php

/** 
 * while assigning new service for each main subnet ip
 * 1- mainIp table will update with particular color 
 * 2-service address will create automatically and store it in to separate table (000.000.000.000/subnetIp-service)
 * 3-all service address will insert into particular service table also
 *  **/
session_start();
if (isset($_POST["submit"])) {
    include '../DbConnection.php';
    $sessionMainIp=$_SESSION['MainIp']; //subnetId
    $sessionsubnetIp=$_SESSION['subnetIp'];  //value
     $col = $db->$sessionMainIp;
    $col_service=$db->services;
    $color='';
    $serviceType=filter_input(INPUT_POST, "service");
    //$id=filter_input(INPUT_POST, "subnetworkAddress");
    
    
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
   
   
   //---------------------------auto generate subblock service IP address ------------------------------------------------//
                                
                                   $subnetBitForLowerLevel;
                                    $totalSubnetsBitLowLevel;
                                    $totalSubnetsLowLevel;
                                    $incrementBit;
                                    $incrementValue;
                                   
                                       //$db = $con->IpManagementDev;
                                        $col = $db->$sessionMainIp;
                                        $col_services = $db->services;

                                        $splitedip = explode('.', $sessionMainIp);
                                        $lastVale = explode('/', $splitedip[3]);

                                        $subnetAddress = $splitedip[0].'.'.$splitedip[1].'.'.$sessionsubnetIp.'.'.$lastVale[0];
                      
                                         $cursor1=$col_services->find();
                                       foreach ($cursor1 as $doc1)
                                         {
                                           
                                            //echo $serviceType;
                                           $ser = $doc1["service"];
                                           // if($doc1["service"]=== $serviceType)
                                           if ( (strcmp( $ser, $serviceType ) )== 0  )
                                            {
                                             
                                               $subnetBitForLowerLevel=$doc1["serviceSubnetBit"];
                                               
                                               $totalSubnetsBitLowLevel = $subnetBitForLowerLevel -24;
                                               $totalSubnetsLowLevel = pow(2 ,$totalSubnetsBitLowLevel);
                                               
                                               $incrementBit = 32 - $subnetBitForLowerLevel;
                                               $incrementValue = pow(2 ,$incrementBit );
                                               
                                               $hostNo = $incrementValue-2;
                                                                       
                                          }
                                       }
                                       
                                               $dbName = $subnetAddress.'/'.$subnetBitForLowerLevel.'-'.$serviceType;
                                               $sunettedCol = $db->createCollection($dbName , 
                                                                 [

                                                                     'serviceBlockAddress' => ['$type' => 'string'],
                                                                     'circuitID' => ['$type' => 'string'],
                                                                     'description' => ['$type' => 'string'],
                                                                     'assignedBy' => ['$type' => 'string'],
                                                                     'assignedDate' => ['$type' => 'string'],
                                                                     'remarks' => ['$type' => 'string'],
                                                                     'hostIP'=>array(),

                                                             ]);
                                               
                                       
                                                  $serviceblock_insert = $db->$dbName;
                                                  $serviAddInser = $db->$serviceType;
                                                  
                                                  $serviceIp = $splitedip[0].'.'.$splitedip[1].'.'.$sessionsubnetIp;
                                                   $serviceIpSub = $lastVale[0];
                                                  $hostIP = [] ;
                                             
                                                  for($x=0;$x < $totalSubnetsLowLevel ; $x++){
                                                            
                                                           
                                                            $serviceAddress = $serviceIp.'.'.$serviceIpSub.'/'.$subnetBitForLowerLevel;
                                                    
                                                            for($y=0; $y <= $hostNo; $y++ )
                                                            {
                                                                $hostValue = $serviceIpSub+$y+1;
                                                                $hostIP[$y]= $serviceIp.'.'.$hostValue;
                                                            }
                                                           
                                                           $insertServiceBlock=array(

                                                          'serviceBlockAddress'=>$serviceAddress,
                                                           'circuitID'=>'null',
                                                           'description'=>'null',
                                                            'assignedBy'=>'null',
                                                            'assignedDate'=>'null',
                                                            'remarks'=>'null',
                                                             'hostIp'=>$hostIP
                                                               

                                                      );
                                                           
                                                         //inserting value into main ip subnet table (000.000.000.000/subnet-servicetype)
                                                         $serviceblock_insert->insertOne($insertServiceBlock);  
                                                          $lastVale = explode('/', $serviceAddress);
                                                         $serviceBlockAddress_ServiceTab = $lastVale[0];
                                                         $insertServiceBlock_service=array(

                                                          'serviceBlockAddress'=>$serviceBlockAddress_ServiceTab,
                                                           'dbName'=>$dbName
                                                           
                                                      );
                                                         //inserting all service block address to paticular service table.
                                                         $serviAddInser->insertOne($insertServiceBlock_service);
                                                         
                                                         $serviceIpSub =$serviceIpSub +$incrementValue;
                                                       }
   header("Location:../home/home.php");
}
