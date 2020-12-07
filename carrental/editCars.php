<?php

require_once "config.php";
session_start();


$type = "";
$brand = '';
$model = "";
$price_per_day = '';
$image = "";



if (isset($_POST['add']) ){
   

    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $price_per_day = $_POST['price_per_day'];


   
    
    $file = $_FILES['image'];

    $image_name = $_FILES['image']['name'];
    $image_location = $_FILES['image']['tmp_name'];
    $store = 'http://localhost:8080/carrental/img/cars/'.$image_name;
    $destination = "C:/xampp/htdocs/carrental/img/cars/".$image_name;
    
    if (move_uploaded_file($image_location,$destination)){
        $mysql_qry = "insert into cars (type, brand,model,price_per_day,image) values ( '$type','$brand' ,'$model','$price_per_day','$store')";
        mysqli_query($link, $mysql_qry);
        header("Location: carlist.php"); 
    }








}
if (isset($_GET['delete'])){

    $id = $_GET['delete'];
    $mysql_qry = "delete from  cars where car_id = $id";
    mysqli_query($link, $mysql_qry);
    
    header("Location: carlist.php"); 
  


    
    
    
    }
    if (isset($_POST['update'])){
        $id = $_POST['id'];
        $type = $_POST['type'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $price_per_day = $_POST['price_per_day'];
        
        $file = $_FILES['image'];

    $image_name = $_FILES['image']['name'];
    $image_location = $_FILES['image']['tmp_name'];
    $store = 'http://localhost:8080/carrental/img/cars/'.$image_name;
    $destination = "C:/xampp/htdocs/carrental/img/cars/".$image_name;
    
    if (move_uploaded_file($image_location,$destination)){
        $mysql_qry = "update  cars  set type = '$type', brand = '$brand', model = '$model', price_per_day = '$price_per_day', image = '$store' where car_id = $id ";
        mysqli_query($link, $mysql_qry);
        header("Location: carlist.php"); 
    }


        
        
        
        
        
        
        }

    





?>