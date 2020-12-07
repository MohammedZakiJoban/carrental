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

require_once "config.php";

if (isset($_GET['edit'])){

    $id = $_GET['edit'];
    $update = true;
    
    $mysql_qry = "select * from  admin where id = $id";
    $result = mysqli_query($link, $mysql_qry);

    if (mysqli_num_rows($result ) > 0 ){
        $row=mysqli_fetch_array ($result);
        $username = $row['username'];
        $password = $row['password'];
       
       
        
    
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
    $sql_qry = " select * from admin;";

$result = mysqli_query($link, $sql_qry);
    
    ?>
    <?php if (isset($_SESSION['message'])):?>
    
    
    
    

    


</div>
<?php endif ?>
    <div class = 'row justify-content-center'>
<table class = 'table'>
    <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th colspan = "2">Action</th>
        </tr>
    </thead>
    <?php
    while ($row = $result->fetch_assoc()):?>
        <tr>
            <td><?php  echo $row['username'];?></td>
            <td><?php  echo $row['password'];?></td>
            
            <td>
                <a href = "adminhome.php?edit=<?php  echo $row['id'];?>" class = 'btn1 btn-info'>Edit</a>
                <a href = "editAdmin.php?delete=<?php  echo $row['id'];?>" class = 'btn1 btn-danger'>Delete</a>


            </td>
        </tr>
    
<?php endwhile; 

?>
    
</table>

    </div>



 
<div class = 'row justify-content-center'>
    
<form action = "editAdmin.php" method = "POST">

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

    <?php if ($update == true):?>
    <button type = 'submit' name  ='update' class = 'btn btn-primary'>Update</button>
    <?php else: ?>
    <button type = 'submit' name  ='add' class = 'btn btn-primary'>add</button>
    <?php endif;  ?>

    </div>



</form>
</div>

</div>


        
    

    
      
    


  
    
  
      
    
  

</body>


</html>
