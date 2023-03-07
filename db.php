<?php
//DB details
$domain = 'http://localhost/';
$dbHost = 'localhost';
$dbUsername = 'liksa';
$dbPassword = 'Korvo228';
$dbName = 'cloud';
//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if($db->connect_error){
   die("Unable to connect database: " . $db->connect_error);
}
