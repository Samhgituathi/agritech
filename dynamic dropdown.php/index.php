<!DOCTYPE html>
<html lang="en">
<head>
  <title>dropdown</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="jquery.js"></script>
  <link rel="stylesheet" href="mystyle.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    body{
        background-image: url(../images/landing.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
  </style>
</head>
<body>





<?php

  $host = 'localhost';
$username = 'root';
$pass = '';
$db = 'agritech';

$db = new mysqli($host,$username,$pass,$db);

if ($db->connect_error) {
	 die("Connection Failed". $db->connect_error);
}
  $query = "SELECT * FROM county Order by county_name";
  $result = $db->query($query);
?>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 p-5">
      <h4>Fill In the following Form To make a Order:</h4>
      
      <form role="form" action="action.php" name="staffform" id="staffform" method="POST" enctype="multipart/form-data" class="ajax">
      <div class="form-group">
        <label>Quantity of your Choice:</label>
        <input type="float" class="form-control" id="quantity" name="quantity" >
      </div>

      <div class="form-group">
        <label>Payrate (ksh/50kgs)</label>
        <input type="float" class="form-control" name="price" id="price" value="2500" readonly >
      </div>

         
        <div class="form-group">
          <label for="email">County</label>
          <select name="county" id="county" class="form-control" onchange="FetchState(this.value)"  required>
            <option value="">Select County</option>
          <?php
            if ($result->num_rows > 0 ) {
               while ($row = $result->fetch_assoc()) {
                echo '<option value='.$row['id'].'>'.$row['county_name'].'</option>';
               }
            }
          ?> 
          </select>
        </div>
        <div class="form-group">
          <label for="pwd">Pick up point</label>
          <select name="pick" id="pickup" class="form-control" onchange="FetchCity(this.value)"  required>
            <option>Select Pickup Point</option>
          </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="submited" id="submited">Submit & Calculate</button>
        </div>
        
      </form>
      <span id="message"></span>
  </div>
  
  </div>
</div>
<script type="text/javascript">
  function FetchState(id){
    $('#pickup').html('');
    
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { county_id : id},
      success : function(data){
         $('#pickup').html(data);
      }

    })
  }

  
$(document).ready(function(){
    $('form.ajax').on('submit', function(event){
        
        var myform = $(this),
            url = myform.attr('action'),
            type = myform.attr('method'),
            data = {};
            myform.find('[name]').each(function(index, value){
                var item = $(this),
                    name = item.attr('name'),
                    value = item.val();
      
                    data[name] = value;
            });
            $.ajax({
              url :url,
              type: type,
              data: JSON.stringify(data),
              success: function(response){
              //  console.log(response);
               $("#message").html(response);
              //  $('form.ajax')[0].reset();
              //  $('#tbody').html(response);
              // $('#maintable').DataTable().ajax.reload();
            //   $('#responser').html(response);
            
              // window.location.replace('school.php');
              
              }
      
            });
        event.preventDefault();
      });
      
    
});
$('.checkout').click(function(){
  var tot = $(this).attr('id').replace('checkout-','');
    mydata = {mytotal:tot};
    jQuery.ajax({
      url:'action.php',
      dataType:'json',
      data: JSON.stringify(mydata),
      type:'POST',
      success :function(resp){
        console.log(resp);
      },
    });
});

$('.checkout').click(function(){
  alert('Buttonclicked');
});
</script>
</body>
</html>
