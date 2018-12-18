  <?php
//session_start();
if (isset($_POST["submit"])) {
include '../DbConnection.php';
    
   //require 'vendor/autoload.php';
    $flag=0;
    $ipAddress = $_POST['ipAddress'];
    $subNetBit = $_POST['subNetBit'];
    $assignedDate= $_POST['assignedDate'];
    $note = $_POST['note'];
    
    $dbName = $ipAddress."/".$subNetBit;
    $subNetBitCount = 24 - $subNetBit;
    $totalSubNets = pow(2,$subNetBitCount);
    $splitedip = explode('.', $ipAddress);
    
     //$con = new MongoDB\Client("mongodb://203.94.64.80:27017");
  // $db = $con->IpManagementDev;
   $col = $db->mainIp;
   $cursor=$col->find();
   foreach ($cursor as $document)
   {
       $networkaddress=$document["networkAddress"];
       if($networkaddress==$ipAddress)
       {
           $flag=1;
       }
   }
   if($flag==1)
   {
       echo "<script>
            alert('Ip Address already exist! Please enter new Ip address');
            window.location.href='addNewMainBlock.php';
            </script>";
   }
 else 
   {
        $sunettedCol = $db->createCollection($dbName , 
         [
    
            'subnetworkAddress' => ['$type' => 'string'],
            'subnetBit' => ['$type' => 'string'],
            'serviceType' => ['$type' => 'string']
    
         ]);
    
        $sunttedCol_insert = $db->$dbName;

        if(isset($_POST['submit']))
        {
       
            $insert=array(
            'networkAddress'=>$ipAddress,
            'subnetBit'=>$subNetBit,
            'assignedDate'=>$assignedDate,
            'note'=>$note

        );
        
         $col->insertOne($insert);
        
         for($x=0;$x < $totalSubNets ; $x++)
         {
            $subnetworkAddress = $splitedip[2] +$x ;
            echo $subnetworkAddress;
            $insertSubnet=array(
       
                    'subnetworkAddress'=>$subnetworkAddress,
                    'serviceType'=>'FREE',
                    'serviceColor'=>'#12e826',
                    'assignDate'=>'null',
                    'assignBy'=>'null',
                    'remarks'=>'null',
                    'status'=>'NONE'
            
                 );
                 $sunttedCol_insert->insertOne($insertSubnet);  
         }
         header("Location: ../mainBlock/mainblockDetails.php");
         } 
   
   }
   
}
 else {
         echo 'not inserted';
              
       }  

