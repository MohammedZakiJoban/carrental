<?php

require_once "config.php";
session_start();





if (isset($_POST['add'])){

$name = $_POST['username'];
$password = $_POST['password'];
$first = $_POST['first'];
$last = $_POST['last'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$license = $_POST['license'];

$mysql_qry = "insert into users (username, password, role_id) values ('$name', '$password', 1)";
mysqli_query($link, $mysql_qry);



$result = mysqli_query($link, "select id from users where username = '$name';");
while ($row=mysqli_fetch_array ($result))
{
    
    $mysql_qry2 = "insert into driver (first_name, last_name, license ,address,phone, email,user_id) Values ('$first','$last',$license ,'$address','$phone',  '$email',".$row['id'].");";
mysqli_query($link, $mysql_qry2);
 
    
}

header("Location: driverlist.php");



}
if (isset($_GET['delete'])){

    $id = $_GET['delete'];
    $mysql_qry = "DELETE users, driver from users LEFT OUTER JOIN driver ON users.id = driver.user_id where users.id = $id";
    mysqli_query($link, $mysql_qry);
    
    header("Location: driverlist.php");
  


    
    
    
    }
    if (isset($_POST['update'])){
        $id = $_POST['id'];

        $name = $_POST['username'];
$password = $_POST['password'];
$first = $_POST['first'];
$last = $_POST['last'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$license = $_POST['license'];
$email = $_POST['email'];
        $mysql_qry = "update  users  set username = '$name', password = '$password' where id = $id ";
        mysqli_query($link, $mysql_qry);
        $mysql_qry = "update  driver  set first_name = '$first', last_name = '$last',licence = '$license', phone = '$phone',address = '$address', email = '$email' where user_id = $id ";
        mysqli_query($link, $mysql_qry);
        header("Location: driverlist.php");
        
        
        
        
        
        }

    





?>