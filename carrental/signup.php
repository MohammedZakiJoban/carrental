<?php
// Include config file
require_once "config.php";


$username = $_POST['username'];
$password = $_POST['password'];
$address = $_POST['Address'];
$email = $_POST['Email'];
$first = $_POST['First_name'];
$last = $_POST['Last_name'];
$phone = $_POST['phone'];

$result = mysqli_query($link, "select * from users where username = '$username';");

if (mysqli_num_rows($result ) > 0 ){

    echo '<script>alert("Username Already Exist")</script>';
    header("Location: index.html"); 

}else{
    $mysql_qry = "insert into users ( username, password, role_id) VALUES ('$username', '$password', 2);";
    



    mysqli_query($link, $mysql_qry);
    $result = mysqli_query($link, "select id from users where username = '$username';");
    while ($row=mysqli_fetch_array ($result))
    {
        
        $mysql_qry2 = "insert into customer (first_name, last_name, address,phone, email,user_id) Values ('$first','$last','$address','$phone',  '$email',".$row['id'].");";
    mysqli_query($link, $mysql_qry2);
        
    }
  
    

   
    
        
        
        
        
    



    



    header("Location: index.html");

}




 

?>