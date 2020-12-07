<?php
session_start();

if (empty($_SESSION['username'])){
  echo "<script>alert('Please Login First');
  window.location.href='index.html';
  </script>"; 
 // header("Location: index.html"); 
}

if(empty($_POST['driver'])){
    $driver = "no";
}else{
    $driver = "yes";
}
$from = $_POST['from'];
$to = $_POST['to'];

$price = $_POST['price'];
$id = $_POST['id'];
$model = $_POST['model'];
$brand = $_POST['brand'];







$diff = strtotime($to) - strtotime($from); 
      

$number_of_days =  abs(round($diff / 86400)); 
$total = $number_of_days * $price;



if (isset($_POST['checkout'])){
  echo "hello";






}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Style.css">


</head>
<body>

    
    
<h2> Checkout Form</h2>

  
    <div class="container">
      <form action="checkout.php" method = 'POST'>
      
        <div class="row">
          <div class="col-50">
           
          <br>
      <br>
      <br>
      <br>
            <div class="container">
            <input type="hidden"  name="id"  value = '<?php  echo $id; ?>' >
            <input type="hidden"  name="brand"  value = '<?php  echo $brand; ?>' >
            <input type="hidden"  name="price"  value = '<?php echo $price?>' >
            <input type="hidden"  name="from"  value = '<?php  echo $from; ?>' >
            <input type="hidden"  name="to"  value = '<?php  echo $to; ?>' >
            <input type="hidden"  name="driver"  value = '<?php  echo $driver; ?>' >
           
      <p><label>Brand<span class="price" ><?php  echo $brand; ?></span></p>
      <p><label>Model<span class="price"><?php  echo $model; ?></span></p>
      <p><label>From <span class="price"><?php  echo $from; ?></span></p>
      <p><label>To <span class="price"><?php  echo $to; ?></span></p>
      <p><label>Price per day <span class="price">$<?php echo $price?></span></p>
      <p><label>Number of days <span class="price"><?php echo $number_of_days?> days</span></p>
      <p><label>Driver <span class="price"><?php echo $driver?></span></p>

      <hr>
      <p>Total <span class="price" style="color:black"><b>$<?php echo $total?></b></span></p>
    </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September"required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018"required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352"required>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          
        </label>
        <input type="submit" name = 'checkout' value="Continue to checkout" class="btn">
      </form>
    </div>
  
 


</body>
</html>

