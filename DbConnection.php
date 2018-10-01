<?php
 require '../vendor/autoload.php';
     
                 try{
                // Connecting to server
                $con = new MongoDB\Client("mongodb://203.94.64.80:27017");
                 }
                 catch(MongoConnectionException $connectionException){
                    print $connectionException;
                    exit;
                 }

