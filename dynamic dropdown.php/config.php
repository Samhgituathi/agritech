<?php
$host = 'localhost';
$username = 'root';
$pass = '';
$db = 'agritech';

$conn = new mysqli($host,$username,$pass,$db);

if ($conn->connect_error) {
	 die("Connection Failed". $conn->connect_error);
}

?>