<?php
$conn = new mysqli("localhost", "root", "", "musicfy");

//check connection
if($conn->connect_error){
	die("Error accessing database: " . $conn->connect_error);
}
?>
