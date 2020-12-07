<?php
session_start();

if (empty($_SESSION['username'])){
  echo "<script>alert('Please Login First');
  window.location.href='index.html';
  </script>"; 
 // header("Location: index.html"); 
}
 require_once "config.php";

$username = $_SESSION['username'];



$result = mysqli_query($link, "select * from users where username = '$username';");

while ($row=mysqli_fetch_array ($result))
{
    
    $password = $row['password'];
    $id = $row['id'];
    
    
    
}

$result = mysqli_query($link, "select * from driver where user_id = '$id';");

while ($row=mysqli_fetch_array ($result))
{
    

    
    $address = $row['address'];
    $email = $row['email'];
    
    $first = $row['first_name'];
    $last = $row['last_name'];
    $phone = $row['phone'];
    $license = $row['license'];
    
    
}












?>

<!DOCTYPE html>
<html>
<head>
<title>Car rental </title>
<meta charset="UTF-8">
<script src="angular.min.js"></script>
<script type="text/javascript" src="sjja.js">

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

<script defer src="script.js"></script>
<link rel="stylesheet" type="text/css" href="sja.css"> 



</head>
<body>
  
  

    
    <div class="head_div">
    
        <!--<div class="logo">
          <img style="width:200px; padding-left:30px;" src=""/>
        </div> -->
             
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    
                    <li><a href="home.php">welcome <?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="profile.php">Profile</a></li>	
                   	
                    <li><a href="logout.php">Logout</a></li>	
                   
                                         
                </ul>
        </nav>
        <!-- #nav-menu-container -->	
            		
          
    </div>
    
    	
    <div class="header" >  
        <h1>YOUR CHOICE OF CARS ON ONE CLICK!</h1>
        <p><bold>Choose and rent from thousands of cars wherever you are.</bold></p>
        
    <img src="shrooog.png" width="400" height="128">
      
    </div>
  
    <form action = "editprofile.php" method  = "POST"> 
        <h1><center>Personal Info</center></h1>


    <label>Username       *</label>
    <input type = "text" name ='username' value = "<?php echo $_SESSION['username']; ?>" required>
    <label>First name        *</label>
    <input type = "text" name ='First_name' value = "<?php echo $first; ?>"  required>
    <label>Last name       *</label>
    <input type = "text" name ='Last_name' value = "<?php echo $last; ?>"  required>
    <label>Email       *</label>
    <input type = "text" name ='Email' value = "<?php echo $email; ?>"  required>
    <label>Password       *</label>
    <input type = "text" id = 'password'  name ='password' value = "<?php echo $password; ?>"  required>
    <label>Address       *</label>
    <input type = "text"   name ='Address'  value = "<?php echo $address; ?>"   required>
    <label>phone       *</label>
    <input type = "text"   name ='phone' value = "<?php echo $phone; ?>"  required>
    <label>License       *</label>
    <input type = "text"   name ='license' value = "<?php echo $license; ?>"  required>
    <input type="submit" value="Update">



    </form>
    
      
    


  
    
    <footer>

    
<div class="footer2">
    <p class="foot">
      
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved made by <a href="https://Smaher.com" target="_blank">Smaher Balatif</a>

    </p>
</div>
</footer>
      
    
  

</body>

</html>
