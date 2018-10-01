  <?php
//session_start();
if (isset($_POST["submit"])) {
//include 'DbConnection.php';
    
   require 'vendor/autoload.php';
    
    $ipAddress = $_POST['ipAddress'];
    $subNetBit = $_POST['subNetBit'];
    $assignedDate= $_POST['assignedDate'];
    $note = $_POST['note'];
    
    $dbName = $ipAddress."/".$subNetBit;
   // echo $dbName;
    $subNetBitCount = 24 - $subNetBit;
    
    $totalSubNets = pow(2,$subNetBitCount);
    
    $splitedip = explode('.', $ipAddress);

//foreach($exploded as $part) {
//  print($part);
    
//    echo $splitedip[2];
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
       
       'subnetworkAddress'=>$subnetworkAddress
            
   );
      $sunttedCol_insert->insertOne($insertSubnet);  
    }
    
    
    
                
  header("Location: frontend/home.php");
  //echo 'Successfully insert';
   } 
 else {
         echo 'not inserted';
              
       }      

       
      
   
  

//  $col->insert($insert);
 
    
   
  
}
   // $password = md5($_POST['password']);
    
//    $database = new dbConnect();
//    
//    $db = $database->openConnection();
//    
//    $sql = "select * from tbl_registered_users where email = '$email' and password= '$password'";
//    $user = $db->query($sql);
//    $result = $user->fetchAll(PDO::FETCH_ASSOC);
//    
//    $id = $result[0]['id'];
//    $name = $result[0]['name'];
//    $email = $result[0]['email'];
//    $_SESSION['name'] = $name;
//    $_SESSION['id'] = $id;
//    
//    $database->closeConnection();
//    header('location: dashboard.php');

?>

