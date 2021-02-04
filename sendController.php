<?php 
	$conn = new mysqli("localhost", "root","","rexx_database");
	if($conn->connect_error){
	die("Faild to connect.".$conn->connect_error);
}

?>