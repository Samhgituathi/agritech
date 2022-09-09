<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body id="body">
    <div class="card" style="width:500px; padding-top: 20px; padding-top: 20px; margin-left: auto; margin-right: auto;width: 570px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    
    ">

   
        <div class="card-body">
            <div style="text-align:center; padding-bottom: 2%;">
                <i style="color:orange;" class="fa fa-unlock-alt fa-5x"></i>
                <h3>Reset Your password</h3>
            </div>
            <form action="" method="POST">
              <div style="text-align:center;margin-right:auto;margin-left:auto;">

              <?php
              include "../db.php";

              if(isset($_POST['submit'])){
              $email=$_GET['key'];
              $password=$_POST['password'];
              $confirmpassword=$_POST['confirmpassword'];

              if($password==$confirmpassword){
                $password=md5($password);

                $sql="UPDATE `users` SET `password`='$password' WHERE email='$email'";
                $results=mysqli_query($conn,$sql);
                if($results){
                  ?>

                  
                  <div style="width:100%; background-color:#d1e7dd;" class="toast show">
                    <div class="alert alert-success">
                  <div class="toast-header bg-success">
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                  </div>
                  <div class="toast-body txt-i">
                    <strong>Congratulation!!<strong>, You have successfully reset your password
                    <a href="../login.html">Proceed to login</a>
                  </div>
                </div>
                </div>
                <?php
                  
                }
                else{
                  
                  echo "<div class='alert alert-danger'>";
                  echo "something went wrong try again";
                  echo "</div>";
                  

                }

              }else{
                echo "<div class='alert alert-danger'>";
                echo "Password Mismatch";
                echo "</div>";
              }


              

              }

              ?>




              </div>
                <div>
                    <label for="usr">Enter your password</label>
                </div>
                <div class="input-group mb-3">
                   
                    <div class="input-group-prepend">
                        
                      <span style="border-right: none;" class="input-group-text bg-transparent"><i class="fa fa-key fa-2x text-black-50"></i></span>
                    </div>
                    <input style="border-left: none;" type="password" name="password" class="form-control" placeholder="Password" required>
                  </div>

                  <div>
                    <label for="usr">Confirm your password</label>
                </div>
                <div class="input-group mb-3">
                   
                    <div class="input-group-prepend">
                        
                      <span style="border-right: none;" class="input-group-text bg-transparent"><i class="fa fa-key fa-2x text-black-50"></i></span>
                    </div>
                    <input style="border-left: none;" type="password" name="confirmpassword" class="form-control" placeholder="confirm password" required>
                  </div>
                <div class="form-group">
                <input style="width: 100%;border-radius: 4px; margin-top: 15px; background-color: green; color:white; border: none; padding:2%" type="submit" name="submit" class="form-group" value="Reset Password">
                </div>


            </form>

          
        </div>
      </div>
      <style>
          body {
               background-image: url('images/tea6.jpg');
               background-repeat: none;
               background-size: cover;
               background-position: center center;
               width: 100%;  
               min-height: 100vh;
               display: -webkit-box;
               display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
            }
      </style>

    </body>
    </html>
    <?php
include 'footer.php';
?>
    