<?php
session_start();
    include '../DbConnection.php';
     $userID = $_GET['userid'];
     $col = $db->user;
    $cursor1=$col->find();
    foreach ($cursor1 as $doc)
    {
            if($doc["usrid"]==$userID)
       {
           $objId=$doc["_id"];
                $col->updateOne(
                         array('_id' => $objId),
                        array (
                                '$set' => array(
                                 'status' => 0
                                    )
                                )
                   );
       }
   }
   
   header("Location:userHandling.php");

