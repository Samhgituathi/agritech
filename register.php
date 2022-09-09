<?php
$servername="localhost";
$username="root";
$password="";
$database="agritech";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo" <script>alert('connection failed')</script>";
}

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $confirmpassword=md5($_POST['cpassword']);
    if($password==$confirmpassword){
        $sql="INSERT INTO users (username,emaiL,password) VALUES('$username',  '$email', '$password')";
        $result=mysqli_query($conn,$sql);
        if ($result){
            header('location:home.php');
        }
     else{
            echo"<script>alert('Error!')</script>";
        
    }
}
}
?>
<?php
include'footer.php';
?>

