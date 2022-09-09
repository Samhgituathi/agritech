<?php
$servername="localhost";
$username="root";
$password="";
$database="agritech";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo" <script>alert('connection failed')</script>";
}

?>