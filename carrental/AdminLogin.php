<?php
// Include config file
require_once "config.php";


$username = $_POST["usernme"];
$password = $_POST["password"];

$mysql_qry = "select * from admin where BINARY username like '$username' and password like '$password';";


$result = mysqli_query($link, $mysql_qry);
if ( mysqli_num_rows($result ) > 0){	

    while ($row=mysqli_fetch_array ($result))
    {
        
session_start();
$_SESSION['username'] = $username ;
header("Location: adminhome.php"); 
        
    }

    
  
}else{
    echo "Invalid Usrename or Password!";
}
 

?>
 