<?PHP


require "config.php";




$sql_qry = " select * from cars;";

$result = mysqli_query($link, $sql_qry);

$response = array();

while($row = mysqli_fetch_array($result)){
	
array_push($response,array("car_id"=>$row[0],"type"=>$row[1],"brand"=>$row[2],"model"=>$row[3],"price_per_day"=>$row[4], "image"=>$row[5]));
	
	
	
}

echo  json_encode($response);



?>