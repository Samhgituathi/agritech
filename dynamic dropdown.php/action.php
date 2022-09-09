<?php
include '../db.php';
session_start();
$data = stripslashes(file_get_contents("php://input"));
 $mydata = json_decode($data, true);

$quantity = $mydata['quantity'];
$county = $mydata['county'];
$pick = $mydata['pick'];
$price = $mydata['price'];
// $uid = $_SESSION['uid'];
$uid = $_SESSION['uid'];
// $uid = "Hello";
$uname = $_SESSION['username'];


$tax = 8.75;

          // This function performs the calculations.
          function calculate_total ($quantity, $price){

            global $tax;

            $total = $quantity * $price; // Calculation
            $taxrate = ($tax / 100) + 1;
            $total = $total * $taxrate; // Add the tax.
            $total = number_format ($total, 2); // Formatting

            return $total; // Return the value.

          } // End of function.

          // Check for a form submission:
          if (isset($mydata['submited'])){

            // Check for values:
            if ( is_numeric($mydata['quantity']) AND is_numeric($mydata['price']) ){

              $sql = "INSERT INTO orders(quantity,payrate,county_id,pickup_id,user_id,status) VALUES($quantity,$price,$county,$pick,$uid,0)";
                if($conn->query($sql) === TRUE){
                  $total = calculate_total($mydata['quantity'], $mydata['price']);
                    $_SESSION['total'] = $total;
                    print "<p>Your total comes to $<span style=\"font-weught:bold;\">$total</span>,including the $tax percent tax rate.</p>";
                    echo "<button class='btn btn-success checkout' style='width:100%;' name='checkout' id='checkout' value='$total'>Proceed to Checkout</button>";
                    echo "<script>
                    $('.checkout').click(function(){
                  
                      let total = $(this).val();
                    // alert('The Value:'+total);
                      $.post('checkout.php', {
                        total: total
                    }, (response) => {
                        // response from PHP back-end
                        console.log(response);
                        window.location.replace('checkout.php');
                    });
                    });
                    
                    </script>";
                }else{
                  // header('Location:index.php?error=dbfailed');
                  echo "SOme error occured with the DB";
                  echo "$quantity,$price,$county,$pick,$uid,$uname";
                }
              // Call the function and print the results:
              

            } else { // Inappropriate values entered.
              print '<p style="color; red;">Please enter a valid quantity and price!</p>';
            }

          }

          
          