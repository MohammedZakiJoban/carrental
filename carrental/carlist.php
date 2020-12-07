<?php
session_start();

if (empty($_SESSION['username'])){
  echo "<script>alert('Please Login First');
  window.location.href='index.html';
  </script>"; 
 // header("Location: index.html"); 
}
$update = false;
$type = "";
$brand = '';
$model = "";
$price_per_day = '';
$image = "";

require_once "config.php";

if (isset($_GET['edit'])){

    $id = $_GET['edit'];
    $update = true;
    
    $mysql_qry = "select * from  cars where car_id = $id";
    $result = mysqli_query($link, $mysql_qry);

    if (mysqli_num_rows($result ) > 0 ){
        $row=mysqli_fetch_array ($result);
    
        $type = $row['type'];
        $brand = $row['brand'];
          $model = $row['model'];
        $price_per_day = $row['price_per_day'];
        $image = $row['image'];
       
       
        
    
    }

    
        
    


    
    
    
    }

?>



<!DOCTYPE html>
<html>
<head>
<title>Cars Page</title>
<meta charset="UTF-8">
<script src="angular.min.js"></script>
<script type="text/javascript" src="sjja.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<script defer src="script.js"></script>
<link rel="stylesheet" type="text/css" href="sja.css"> 
<style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>



</head>
<body>
  
  

    
    <div class="head_div">
    
        <!--<div class="logo">
          <img style="width:200px; padding-left:30px;" src=""/>
        </div> -->
             
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    
                    <li><a href="adminhome.php">welcome <?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="customerlist.php">Customers</a></li>	
                    <li><a href="driverlist.php">Drivers</a></li>
                    <li><a href="carlist.php">Cars</a></li>	
                    <li><a href="historylist.php">Renting History</a></li>	
                    <li><a href="couponelist.php">Coupne</a></li>
                   
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
  <div class = "container">
    <?php
    require_once 'config.php';
    $sql_qry = " select * from cars;";

$result = mysqli_query($link, $sql_qry);
    
    ?>
    
    
    
    
    

    


</div>
<div class = 'container'>

    <div class = 'row justify-content-center'>
<table class = 'table'>
    <thead>
        <tr>
            <th>Type</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Price per day</th>
            <th>image</th>
            
            <th colspan = "2">Action</th>
        </tr>
    </thead>
    <?php
    while ($row = $result->fetch_assoc()):?>
        
            <td><?php  echo $row['type'];?></td>
            <td><?php  echo $row['brand'];?></td>
            <td><?php  echo $row['model'];?></td>
            <td><?php  echo $row['price_per_day'];?></td>
            <td><?php  echo $row['image'];?></td>
            
            <td>
                <a href = "carlist.php?edit=<?php  echo $row['car_id'];?>" class = 'btn1 btn-info'>Edit</a>
                <a href = "editCars.php?delete=<?php  echo $row['car_id'];?>" class = 'btn1 btn-danger'>Delete</a>


            </td>
        </tr>
    
<?php endwhile; 

?>
    
</table>

    </div>



 
<div class = 'row justify-content-center'>
    
<form action = "editCars.php" method = "POST" enctype="multipart/form-data">

<div class = "form-group">

<input type = "hidden" name ="id" value="<?php echo $id;?>">

    <label>Type       </label>
    <input type = "text" name ='type' class = "form-control" value="<?php  echo $type;?>">
    </div>
    <div class = "form-group">
    <label>Brand        </label>
    <input type = "text" name ='brand' class = "form-control" value="<?php  echo $brand;?>">
    </div>
    <div class = "form-group">
    <label>Model        </label>
    <input type = "text" name ='model' class = "form-control" value="<?php  echo $model;?>">
    </div>
    <div class = "form-group">
    <label>Price per day        </label>
    <input type = "text" name ='price_per_day' class = "form-control" value="<?php  echo $price_per_day;?>">
    </div>
    <div class = "form-group">
    <label>Image        </label>
    <input type = "file" name ='image' class = "form-control" value="<?php  echo $image;?>">
    </div>
   
    <div class = "form-group">

    <?php if ($update == true):?>
    <button type = 'submit' name  ='update' class = 'btn btn-primary'>Update</button>
    <?php else: ?>
    <button type = 'submit' name  ='add' class = 'btn btn-primary'>add</button>
    <?php endif;  ?>

    </div>



</form>
</div>

</div>


        
    

    
      
    


  
    
  
      
    
  
</div>
</body>


</html>
