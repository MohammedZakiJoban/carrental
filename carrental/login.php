<?php
// Include config file
require_once "config.php";


$username = $_POST["uname"];
$password = $_POST["psw"];

$mysql_qry = "select * from users where BINARY username like '$username' and password like '$password';";


$result = mysqli_query($link, $mysql_qry);
if ( mysqli_num_rows($result ) > 0){	

    while ($row=mysqli_fetch_array ($result))
    {
        
session_start();
        if ($row['role_id'] == 1){
            
            header("Location: driverhome.php");
            $_SESSION['username'] = $username ;
           
        }else{
            
            header("Location: home.php"); 
            $_SESSION['username'] = $username ;
             
        }
        
    }

    
  
}else{
    echo "Invalid Usrename or Password!";
}
 

?>
 