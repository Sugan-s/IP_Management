<?php
  include '../DbConnection.php';
  $flag=0;
   $col = $db->services;
   
   if(filter_input_array(INPUT_POST))
   {
       $servi=  filter_input(INPUT_POST, "service");
       $service= str_replace(' ', '_', $servi);
       $colorvalue=filter_input(INPUT_POST, "colourValues");
       $cursor=$col->find();
       foreach ($cursor as $document)
       {
          $getservice= $document["service"];
          $getcolorvalue=$document["colourValues"];
          if($getservice==$service)
          {
              $flag=1;
          }
          else if($getcolorvalue==$colorvalue)
          {
              $flag=2;
          }
       }
       
       if($flag==1)
       {
                   echo "<script>
            alert('Service already exist! Please enter new service');
            window.location.href='addNewService.php';
            </script>";
       }
       else if ($flag==2) 
       {
           echo "<script>
            alert('Service colour already exist! Please enter select another colour');
            window.location.href='addNewService.php';
            </script>";
       }
       else{
       $add=array(
            "service"=> $service,
             "colourValues"=>$colorvalue,
           "serviceSubnetBit"=>filter_input(INPUT_POST, "subNetBit"),
        "note"=> filter_input(INPUT_POST, "note"),
         
        );
       
        
            $col->insertOne($add);
            $db->createCollection($service , 
                        [

                     'serviceBlockAddress' => ['$type' => 'string'],
                                                                     
                        ]);
  
             header("Location: serviceDetails.php");
        
       }

   } 
   
 else {
              echo 'not inserted';
    }