  <?php
//session_start();
if (isset($_POST["submit"])) {
include '../DbConnection.php';
    
   //require 'vendor/autoload.php';
    
    $ipAddress = $_POST['ipAddress'];
    $subNetBit = $_POST['subNetBit'];
    $assignedDate= $_POST['assignedDate'];
    $note = $_POST['note'];
    
    $dbName = $ipAddress."/".$subNetBit;
   // echo $dbName;
    $subNetBitCount = 24 - $subNetBit;
    
    $totalSubNets = pow(2,$subNetBitCount);
    
    $splitedip = explode('.', $ipAddress);
     $con = new MongoDB\Client("mongodb://203.94.64.80:27017");
   $db = $con->IpManagementDev;
   $col = $db->mainIp;
    $sunettedCol = $db->createCollection($dbName , 
    [
    
        'subnetworkAddress' => ['$type' => 'string'],
        'subnetBit' => ['$type' => 'string'],
        'serviceType' => ['$type' => 'string']
    
]);
    
    $sunttedCol_insert = $db->$dbName;

//var_dump($result);
   if(isset($_POST['submit']))
   {
       
        $insert=array(
       'networkAddress'=>$ipAddress,
       'subnetBit'=>$subNetBit,
       'assignedDate'=>$assignedDate,
       'note'=>$note

   );
        
         $col->insertOne($insert);
        
    for($x=0;$x < $totalSubNets ; $x++){
         $subnetworkAddress = $splitedip[2] +$x ;
         echo $subnetworkAddress;
        $insertSubnet=array(
       
       'subnetworkAddress'=>$subnetworkAddress,
        'service'=>'#12e826',
        'assignDate'=>'null',
         'assignBy'=>'null'
            
   );
      $sunttedCol_insert->insertOne($insertSubnet);  
    }
    
    
    
                
  header("Location: ../frontend/home.php");
  //echo 'Successfully insert';
   } 
 else {
         echo 'not inserted';
              
       }      

  
}


