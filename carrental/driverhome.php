<?php
session_start();

if (empty($_SESSION['username'])){
  echo "<script>alert('Please Login First');
  window.location.href='index.html';
  </script>"; 
 // header("Location: index.html"); 
}

?>



<!DOCTYPE html>
<html>
<head>
<title>Car rental </title>
<meta charset="UTF-8">
<script src="angular.min.js"></script>
<script type="text/javascript" src="sjja.js"></script>



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
                    <li><a href="driverProfile.php">Profile</a></li>	
                    
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
  
    <div class="w3-container">
    <center>
    <h2>Cars Brand</h2>
 





  <img src="images (1).jpg" style="width:70%"></center>
  </div>
 





</div>
    
      
    <div id = "about" class="con">
      <div class="about">
        <img src="selwan.jpg" width="400" height="400">
        <br>
        <br>
        <br>
          
        <h1>About us</h1>
        <p>
          In our site, we work to provide the best services to our customers.. <br>
          by facilitating the reservation mechanism <br> 
          and ensuring the availability of the car at the best prices .. <br>
          in addition to our other services that we are working to provide ..
        </p>
      </div>  
    </div>


  
    
    <footer>

    
    <div class="footer">
        <p class="foot">
          
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved made by <a href="https://Smaher.com" target="_blank">Smaher Balatif</a>

        </p>
    </div>
  </footer>
      
    
  

</body>

</html>
