<?php

require_once "config.php";
session_start();


$username = "";
$password = '';


if (isset($_POST['add'])){

$name = $_POST['username'];
$password = $_POST['password'];
$mysql_qry = "insert into admin (username, password) values ('$name', '$password')";
mysqli_query($link, $mysql_qry);
header("Location: adminhome.php"); 





}
if (isset($_GET['delete'])){

    $id = $_GET['delete'];
    $mysql_qry = "delete from  admin where id = $id";
    mysqli_query($link, $mysql_qry);
    
    header("Location: adminhome.php"); 
  


    
    
    
    }
    if (isset($_POST['update'])){
        $id = $_POST['id'];

        $username = $_POST['username'];
        $password = $_POST['password'];
        $mysql_qry = "update  admin  set username = '$username', password = '$password' where id = $id ";
        mysqli_query($link, $mysql_qry);
        header("Location: adminhome.php"); 
        
        
        
        
        
        }

    





?>