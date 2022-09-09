<?php
    include 'db.php';
    ?>
<!doctype html>
<html> 
    <head>        
        <title>index page</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="mystyle.css" rel="stylesheet">
        <style>
            body{
                background :    #fff;
            }
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  /* padding: 4px; */
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 0;
  cursor: pointer;
}
.button2 {border-radius: 8px;}
</style>
    </head>
<body>
    <!-- <img class="landing" src="images/.landing.jng" alt=""> -->
    <nav class="menu">
         <ul>

             <li><a href="about.html">about us</a></li>
              <li><a href="login.html">login</a></li>
              <li><a href="services.html">services</a></li>
              <li><a href="dynamic dropdown.php/index.php">order</a></li>
             <li><a href="register.html">register</a></li>
         </ul>
    </nav>
    <section>
    <table id="customers">
        <tr>
            <th>#</th>
            <th>Quantity</th>
            <th>County</th>
            <th>Pick-up</th>
            <th>User</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php 
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          $data = array();
          $count =0;
          while($row = $result->fetch_assoc()) {
            $count += 1;
        
        ?>
    
       
        <tr>
            <td><?php echo $count?></td>
            <td><?php echo $row['quantity']?></td>
            <td><?php $county = $row['county_id'];
                        $c = "SELECT * FROM county WHERE  id= $county";
                        $cresult = $conn ->query($c);
                        $crow = mysqli_num_rows($cresult);
                        $cname = mysqli_fetch_array($cresult);
                        if($crow == 1){
                            $name = $cname['county_name'];
                            echo $name;
                        }else{
                            echo "Null";
                        }
            
            ?></td>
            <td><?php $pick = $row['pickup_id'];
                         $p = "SELECT * FROM pickup_point WHERE  id= $pick";
                         $presult = $conn ->query($p);
                         $prow = mysqli_num_rows($presult);
                         $pname = mysqli_fetch_array($presult);
                         if($prow == 1){
                             $point = $pname['pick'];
                             echo $point;
                         }else{
                             echo "Null";
                         }
            ?></td>
            <td><?php $uid = $row['user_id'];
                        $u = "SELECT * FROM users WHERE  id= $uid";
                        $uresult = $conn ->query($u);
                        $urow = mysqli_num_rows($uresult);
                        $uname = mysqli_fetch_array($uresult);
                        if($urow == 1){
                            $username = $uname['username'];
                            echo $username;
                        }else{
                            echo "Null";
                        }
            ?></td>
            <td><?php $state = $row['status'];
                if($state == 0){
                    echo "Pending";
                }else if($state == 1){
                    echo "Approved";
                }else{
                    echo "Null";
                }
            ?></td>
            <td><button class="button button2">4px</button></td>
        </tr>
        <?php
          }
        } else {
          echo "0 results";
        }
        ?>
        
        <tr>
            <th>#</th>
            <th>Quantity</th>
            <th>County</th>
            <th>Pick-up</th>
            <th>User</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </table>
    </section>

</body>
</html>
