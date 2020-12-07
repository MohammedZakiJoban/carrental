<?php
session_start();

if (empty($_SESSION['username'])){
  echo "<script>alert('Please Login First');
  window.location.href='index.html';
  </script>"; 
 // header("Location: index.html"); 
}
?>

<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<script src="angular.min.js">
    
</script>
<script type="text/javascript" src="sjja.js"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
 ></script>
<link rel="stylesheet" type="text/css" href="sja.css"> 

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




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
                    <li><a href="cars.html">Cars</a></li>	
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
  

    <h2><center>Cars </center>  </h2>
      
    <div class = "container"  >
        <hr>
        <div id = "yourID" class="row">


        </div>
        
        
     
     
    
    
          
    
</div>
 

   
        
        
   
  
    


      


</body>



<script>
    $('document').ready(function () { 
       
$.ajax({
    type: "GET",
    url: 'getcars.php',
    dataType: 'json',
    success: function(data){

        $.each(data, function(key, value){
            ID = value.car_id;
		    type = value.type;
            brand = value.brand;
            model = value.model;
           
            price_per_day = value.price_per_day;
            image = value.image;

           
            $('#yourID').append("<div class = 'col-md-4 product-grid'><div class = 'image'><a href='cardetails.php'><img src = '"+image+"' style='width:160px;height:160px;'>"

    +"</a><h4 class = 'text-center'>"+brand+"  </h4><h5 class = 'text-center'> "+price_per_day+"</h5><a href='cardetails.php?id="+ID+"' class = 'btn'>Rent</a></div></div>")
								
        //$('#yourID').append("<li><div class = 'col-md-3'><div class = 'product-top'>"
        //+"<h4>"+brand+"</h4><img src='"+image+"' alt='' width '50%'><button type='butto'  class ='btn btn-secondary'  title= '"+brand+"' >"
        //+"Rent</button></div><div class = 'product-bottom text-center'><h4>"+model+"</h4><h6>"+price_per_day+"</h6></div></li>" );

    });

                                         

                           
    }
});




    });
</script>
</html>
