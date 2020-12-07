<?php

require_once "config.php";
session_start();


if (isset($_POST['checkout'])){
    $id = $_POST['id'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $price = $_POST['price'];
    $driver = $_POST['driver'];

    $username = $_SESSION['username'];

    $result = mysqli_query($link, "select id from users where username = '$username';");
    while ($row=mysqli_fetch_array ($result))
    {
        $customer_id = $row['id'];
     
        
    }
    $result = mysqli_query($link, "select driver_id FROM driver WHERE EXISTS ( SELECT 1 FROM renting_history WHERE driver.driver_id = renting_history.ID )");
    while ($row=mysqli_fetch_array ($result))
    { 
        $driver_id = $row['driver_id'];
    
        
     
        
    }



  
    $result =  "insert into renting_history ( customer_id, driver_id, car_id,date_from,date_to,total) VALUES ('$customer_id', '$driver_id', '$id','$from','$to','$price');";
    mysqli_query($link, $result);
    header ("location : home.php");

  
  
  
  
  
  
  }


?>

