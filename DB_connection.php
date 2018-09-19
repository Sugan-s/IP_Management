<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$connection = new Mongo();

require_once 'vendor/autoload.php';


$collection = (new MongoDB\Client)->test->users;

$insertOneResult = $collection->insertOne([
    'username' => 'admin',
    'email' => 'admin@example.com',
    'name' => 'Admin User',
]);

printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
//
var_dump($insertOneResult->getInsertedId());
// Configuration
//$dbhost = 'localhost';
//$dbname = 'IP_Dev';
// 
//// Connect to test database
//$m = new Mongo("mongodb://$dbhost");
//$db = $m->$dbname;
// 
//// select the collection
//$collection = $db->shows;
// 
//// pull a cursor query
//$cursor = $collection->find();