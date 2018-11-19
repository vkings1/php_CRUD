<?php

$dsn = 'mysql:host=192.168.254.101;dbname=testdb';

$username = 'root';
$password = 'elmer06';
$options = [];

try{
    $conn = new PDO($dsn, $username, $password, $options);

}catch(PDOException $e){

}
?>