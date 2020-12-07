<?php

require_once "config.php";
session_start();


$username = "";
$password = '';


if (isset($_POST['add'])){

$name = $_POST['name'];
$expiration_date = $_POST['expiration_date'];
$present = $_POST['present'];
$mysql_qry = "insert into coupon (expiration_date, present,name) values ( '$expiration_date','$present' ,'$name')";
mysqli_query($link, $mysql_qry);
header("Location: couponelist.php"); 





}
if (isset($_GET['delete'])){

    $id = $_GET['delete'];
    $mysql_qry = "delete from  coupon where coupon_id = $id";
    mysqli_query($link, $mysql_qry);
    
    header("Location: couponelist.php"); 
  


    
    
    
    }
    if (isset($_POST['update'])){
        $id = $_POST['id'];

        $name = $_POST['name'];
$expiration_date = $_POST['expiration_date'];
$present = $_POST['present'];
        $mysql_qry = "update  coupon  set expiration_date = '$expiration_date', present = '$present', name = '$name' where coupon_id = $id ";
        mysqli_query($link, $mysql_qry);
        header("Location: couponelist.php"); 
        
        
        
        
        
        }

    





?>