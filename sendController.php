<?php 
	$conn = new mysqli("localhost", "root","","rexx_database");
	if($conn->connect_error){
	die("Faild to connect.".$conn->connect_error);
}
$datas= json_decode(file_get_contents(__DIR__.'/events.json'), true);

foreach($datas as $row) {
		
			
	$sql="INSERT INTO programs(participation_id, employee_name,employee_mail,event_id,event_name,participation_fee,event_date,version) VALUES ('".$row["participation_id"]."','".$row["employee_name"]."','".$row["employee_mail"]."','".$row["event_id"]."','".$row["event_name"]."','".$row["participation_fee"]."','".$row["event_date"]."','".@$row["version"]."')";
	
	 
	mysqli_query($conn, $sql);
	}

function check($conn){
	$query = "SELECT participation_id FROM programs";
 	$statement = $connect->prepare($query);
 	$statement->execute();


 	if($statement!=$datas['participation_id']){
 		mysqli_query($conn, $sql);
 	}

 	else{
 		echo "your data already exists";
 	}
}
 


?>