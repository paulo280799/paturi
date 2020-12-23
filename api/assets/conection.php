<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'paturi';

$strcon = new mysqli($host, $user, $pass, $database);

if($strcon->connect_error){
    die("Connection failed:".$strcon->connection_error);
}


?>