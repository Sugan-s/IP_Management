<?php
include '../DbConnection.php';
   $db = $con->IpManagementDev;
   $dbn='115.222.64.0/19';
   $col = $db->$dbn;
   $col_service=$db->services;
 $color='';
   $s=filter_input(INPUT_POST, "service");
   $cursor=$col_service->find();
     foreach ($cursor as $doc)
    {
            if($doc["service"]==$s)
       {
           $color=$doc["colourValues"];
    
       }
   }
// echo $color;
//exit();
    if(filter_input_array(INPUT_POST))
   {
        $id=filter_input(INPUT_POST, "subnetworkAddress");
       $updateResult=$col->updateOne(["subnetworkAddress"=>$id],
                   ['$set'=>["service" => '$color']]
//                 array("upsert" => true,"multiple"=>true)
          );

       var_dump($updateResult);
       //$col->updateOne($updateResult);
                header("Location: ../frontend/home.php");
//        $criteria = array("subnetworkAddress"=>filter_input(INPUT_POST, "subnetworkAddress"));
//         $newdata = array('$set'=>array("service"=>'#dde01a'));
//          //$options = array("upsert"=>true);
//           $ret = $col->updateOne(
//            $criteria,
//            $newdata
//            //$options
//        );
        //var_dump($ret);
        
//              if($ret)
//            {
//            
//             header("Location: ../frontend/home.php");
//        }
//         else {
//              echo 'not inserted';
//        }

   } 
// $db = $c->university;
//        $collection = $db->students;
// 
//        $criteria = array("name"=>"mitra");
//        $newdata = array('$set'=>array("marks"=>85));
//        $options = array("upsert"=>true,"multiple"=>true);
// 
//        $ret = $collection->update(
//            $criteria,
//            $newdata,
//            $options
//        );
//        var_dump($ret);

   