<?php
// Include config file
require_once "config.php";

session_start();
$OrginalUsername = $_SESSION['username'];

$username = $_POST['username'];
$password = $_POST['password'];
$address = $_POST['Address'];
$email = $_POST['Email'];
$first = $_POST['First_name'];
$last = $_POST['Last_name'];
$phone = $_POST['phone'];
$license = $_POST['license'];



$result = mysqli_query($link, "select * from users where username = '$OrginalUsername';");
if (mysqli_num_rows($result ) > 0 ){
    while ($row=mysqli_fetch_array ($result))
    {

    $mysql_qry = "update users set username = '$username' , password = '$password' where username = '$OrginalUsername' ;";
    $result = mysqli_query($link,$mysql_qry);
    
    

    $mysql_qry = "update driver set first_name = '$first' , last_name = '$last', license = '$license', phone = '$phone', email = '$email', address = '$address' where user_id = '$row[driver_id]' ;";
    mysqli_query($link,$mysql_qry);
    $_SESSION['username']= $username;



    header("Location: index.html"); 
   
    }

}


/*else{
    
    



    mysqli_query($link, $mysql_qry);
    $result = mysqli_query($link, "select id from users where username = '$username';");
    while ($row=mysqli_fetch_array ($result))
    {
        
        $mysql_qry2 = "insert into customer (first_name, last_name, address,phone, email,user_id) Values ('$first','$last','$address','$phone',  '$email',".$row['id'].");";
    mysqli_query($link, $mysql_qry2);
        
    }

}
 */

?>