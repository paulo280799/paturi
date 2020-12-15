<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'paturi';

//$host = 'localhost';
//$database = 'paturism_pdfc';
//$user = 'paturism_pdfc';
//$pass = 'f46qbiIHoD';

$strcon = new mysqli($host, $user, $pass, $database);

if($strcon->connect_error){
    die("Connection failed:".$strcon->connection_error);
}


?>