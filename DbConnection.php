<?php
//ini_set('display_errors',1);
 require '../vendor/autoload.php';
     
                 try{
                // Connecting to server
                //$con = new MongoDB\Client("mongodb://192.168.3.25:27017");
                $con = new MongoDB\Client("mongodb://203.94.64.80:27017");
                // $con = new MongoDB\Client("mongodb://localhost:27017");
                     
                $db = $con->IpManagementDev;
                 }
                 catch(MongoConnectionException $connectionException){
                    print $connectionException;
                    exit;
                 }

