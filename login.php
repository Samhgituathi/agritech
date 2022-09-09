<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$database="agritech";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo" <script>alert('connection failed')</script>";
}
 if(isset($_POST['submit'])){
     $email=$_POST['email'];
     $password=md5($_POST['password']);

     $sql="SELECT * FROM `users` WHERE email='$email' AND password='$password'";
     $results=mysqli_query($conn,$sql);
     if($results){
         $data=mysqli_num_rows($results);
         if($data==1){
             while($row=mysqli_fetch_array($results)){
                 $username=$row['username'];
                 $email=$row['email'];
                 $uid = $row['id'];
                 
                 $_SESSION['loggedin']=true;
                 $_SESSION['username']=$username;
                 $_SESSION['email']=$email;
                 $_SESSION['uid'] =$uid;

                 header("location:home.php");
             }

         }else{
             echo "<div style='color:red;'>";
             echo "incorrect email or password";
             echo "</div>";
             header("location:home.php");

         }
     }
 }