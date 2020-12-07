<?php





session_start();

if (empty($_SESSION['username'])){
  echo "<script>alert('Please Login First');
  window.location.href='index.html';
  </script>"; 
 // header("Location: index.html"); 
}
require_once "config.php";
$id =  $_REQUEST['id'];

$result = mysqli_query($link, "select * from cars where car_id = '$id';");

while ($row=mysqli_fetch_array ($result))
{
    
    $type = $row['type'];
    $brand = $row['brand'];
    $model = $row['model'];
    $price_per_day = $row['price_per_day'];
    $image = $row['image'];

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
                    <li><a href="cars.php">Cars</a></li>	
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

  <hr>
  <div class="contact">
    <div class = "container">
        <div class= "row">
            <div class="col-md-5">
                <img class = "d-block w-100" src = <?php echo $image?>>

                
            </div>
            <div class="col-md-7">
                <center>
                <p class = "text-center"><?php echo $brand?> <?php echo $model?></p>
                <h5 class = "text-center"><?php echo $type?></h5>
                <h6 class = "text-center">Price per day<?php echo $price_per_day?>$</h6>
                <form action = "payment.php" method = "POST">
                     <label >Rent from:</label>
                     <input type="date" id="from" name="from" value = <?php print(date("Y-m-d")); ?>><br>
                     <label >Rent To:</label>
                     <input type="date" id="to" name="to" value = <?php print(date("Y-m-d")); ?>><br>
                     <label for="driver">With a driver</label>
                     <input type="radio" id="driver" name="driver" value="driver"><br>
                     <input type = 'hidden'  name = 'price' value = "<?php echo $price_per_day?>">
                     <input type = 'hidden'  name = 'id' value = "<?php echo $id?>">
                     <input type = 'hidden'  name = 'model' value = "<?php echo $model?>">
                     <input type = 'hidden'  name = 'brand' value = "<?php echo $brand?>">

                     <input type = "submit" value = "Rent">
                     <br>
                     
                     </center>
</form>


            </div>

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
            available_cars =value.available_cars;
            price_per_day = value.price_per_day;
            image = value.image;

           
            $('#yourID').append("<div class = 'col-md-4 product-grid'><div class = 'image'><a href='#'><img src = '"+image+"' class = 'w-75'>"

    +"</a><h4 class = 'text-center'>"+brand+" </h4><h5 class = 'text-center'> "+price_per_day+"</h5><a href='cardetails.php' class = 'btn buy'>Rent</a></div></div>")
								
        //$('#yourID').append("<li><div class = 'col-md-3'><div class = 'product-top'>"
        //+"<h4>"+brand+"</h4><img src='"+image+"' alt='' width '50%'><button type='butto'  class ='btn btn-secondary'  title= '"+brand+"' >"
        //+"Rent</button></div><div class = 'product-bottom text-center'><h4>"+model+"</h4><h6>"+price_per_day+"</h6></div></li>" );

    });

                                         

                           
    }
});




    });
</script>
</html>
