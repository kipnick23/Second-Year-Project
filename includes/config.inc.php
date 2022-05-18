<?php

$host = "localhost";
$user = "root";
$pwd = "";
$db = "projectdb";

$con= new mysqli ($host, $user, $pwd, $db);
 

if ($con->connect_error){
	die ("Connection failed:". $con->connect_error);
}

?>