<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"type="text/css"href="style.css">
    <title>reset password</title>
    <style>
        body{
            background-image: url(../images/landing.jpg);
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="card-body">
                <h3>Forgot your password?..</h3>
                Enter your email address and we'll send you a link to<br> reset your password.
            </div>

            <form action="" method="post">
                <div class="form-group">
                <?php

                    include "../db.php";
                    require 'includes/Exception.php';
                    require 'includes/PHPMailer.php';
                    require 'includes/SMTP.php';
                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;
                    use PHPMailer\PHPMailer\SMTP;

                    if(isset($_POST['submit'])){
                        $email=$_POST['email'];

                        $sql="SELECT * FROM `users` WHERE email='$email'";
                        $results=mysqli_query($conn,$sql);
                        if($results){
                        $data=mysqli_num_rows($results);
                        if($data>0){
                            while($row=mysqli_fetch_array($results)){
                                $email=$row['email'];
                                $username=$row['username'];
                                
                            }

                            $link="<a href='http://localhost/projects/agri-tech/login/newpass.php?key=".$email."'>LINK</a>";
                            
                            
                            
                          
                            $mail = new PHPMailer();
                            $mail->IsSMTP(); 
                          
                            $mail->SMTPDebug  = 0;  
                            $mail->SMTPAuth   = TRUE;
                            $mail->SMTPSecure = "tls";
                            $mail->Port       = 587;
                            $mail->Host       = "smtp.gmail.com";
                            $mail->Username   = "samhgituathi@gmail.com";
                            $mail->Password   = "37014158";
                          
                            $mail->IsHTML(true);
                            $mail->AddAddress("$email");
                            $mail->SetFrom("samhgituathi@gmail.com", "Agri Tech");
                            $mail->Subject = "Change Your Password";
                            $content = '<span style="font: size 15px;">Hello '.$username.',<br><br>
                            Forgot your password? Dont worry, It happens to the best of us,<br><br>
                            Create your new password '.$link.'</span>';
                          
                            $mail->MsgHTML($content); 
                            if($mail->Send())
                            {
                            echo "<div class='alert alert-success'>";
                            echo "Check Your Email and Click on the link sent to your email";
                            echo "</div>";
                            }
                            else
                            {
                            echo "Mail Error - >".$mail->ErrorInfo;
                            }


                        }else{
                            echo "<div class='alert alert-danger'>";
                            echo "Email doesn't exist";
                            echo "</div>";
                        }
                        }
                    }

                ?>
                    <label for="usr">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                    <input style="width:30%;border-radius: 4px; margin-top: 15px; background-color: green; color:white; border: none; padding:2%" type="submit" name="submit" class="form-group" value="Send">
                    </div>
                    <div style="text-align: center; margin-top: 15px;">
                    Remember your password? <a style="text-decoration: none;"href="../login.html">Sign in</a>
                    </div>



            </form>
               

          
        </div>
      </div>
    
</body>
</html>
<?php
include 'footer.php';
?>