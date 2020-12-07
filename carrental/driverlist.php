<?php
session_start();

if (empty($_SESSION['username'])){
  echo "<script>alert('Please Login First');
  window.location.href='index.html';
  </script>"; 
 // header("Location: index.html"); 
}
$update = false;
$username ='';
$password = '';
$first = '';
$last = '';
$phone = '';
$email = '';
$address = '';
$license = '';


require_once "config.php";

if (isset($_GET['edit'])){

    $id = $_GET['edit'];
    $update = true;
    
    $mysql_qry = " select * FROM users LEFT OUTER JOIN driver ON users.id = driver.user_id where users.id = $id;";
    
    $result = mysqli_query($link, $mysql_qry);

    if (mysqli_num_rows($result ) > 0 ){
        $row=mysqli_fetch_array ($result);
        $username = $row['username'];
        $password = $row['password'];
        $first = $row['first_name'];
        $last = $row['last_name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $address = $row['address'];
       
       
        
    
    }

    
        
    


    
    
    
    }

?>



<!DOCTYPE html>
<html>
<head>
<title>Admin Page</title>
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
    $sql_qry = " select * FROM users LEFT OUTER JOIN driver ON users.id = driver.user_id where users.role_id = 1;";

$result = mysqli_query($link, $sql_qry);
    
    ?>
    
    
    
    
    

    




    <div class = 'row justify-content-center'>
<table class = 'table'>
    <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>First name</th>
            <th>Last name</th>
            <th>License</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th colspan = "2">Action</th>
        </tr>
    </thead>
    <?php
    while ($row = $result->fetch_assoc()):?>
        <tr>
            <td><?php  echo $row['username'];?></td>
            <td><?php  echo $row['password'];?></td>
            <td><?php  echo $row['first_name'];?></td>
            <td><?php  echo $row['last_name'];?></td>
            <td><?php  echo $row['license'];?></td>
            <td><?php  echo $row['address'];?></td>
            <td><?php  echo $row['phone'];?></td>
            <td><?php  echo $row['email'];?></td>
            
            
            <td>
                <a href = "driverlist.php?edit=<?php  echo $row['id'];?>" class = 'btn1 btn-info'>Edit</a>
                <a href = "editDriver.php?delete=<?php  echo $row['id'];?>" class = 'btn1 btn-danger'>Delete</a>


            </td>
        </tr>
    
<?php endwhile; ?>
    
</table>

    </div>



 
<div class = 'row justify-content-center'>
    
<form action = "editDriver.php" method = "POST">

<div class = "form-group">

<input type = "hidden" name ="id" value="<?php echo $id;?>">
    <label>Username       </label>
    <input type = "text" name ='username' class = "form-control" value="<?php  echo $username;?>">
    </div>
    <div class = "form-group">
    <label>Password        </label>
    <input type = "text" name ='password' class = "form-control" value="<?php  echo $password;?>">
    </div>
    <div class = "form-group">
    <label>First name        </label>
    <input type = "text" name ='first' class = "form-control" value="<?php  echo $first;?>">
    </div>
    <div class = "form-group">
    <label>Last name        </label>
    <input type = "text" name ='last' class = "form-control" value="<?php  echo $last;?>">
    </div>
    <div class = "form-group">
    <label>License        </label>
    <input type = "text" name ='license' class = "form-control" value="<?php  echo $license;?>">
    </div>
    <div class = "form-group">
    <label>Phone        </label>
    <input type = "text" name ='phone' class = "form-control" value="<?php  echo $phone;?>">
    </div>
    <div class = "form-group">
    <label>address        </label>
    <input type = "text" name ='address' class = "form-control" value="<?php  echo $address;?>">
    </div>
    <div class = "form-group">
    <label>Email        </label>
    <input type = "text" name ='email' class = "form-control" value="<?php  echo $email;?>">
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
