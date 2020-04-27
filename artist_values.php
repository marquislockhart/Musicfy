<?php
require 'db.php';
// values of 'artists' table
$artist_name = $_POST["name"];
$artist_bio = $conn->real_escape_string(trim($_POST["bio"]));

$sql = "insert into artists (name, bio) values ('$artist_name', '$artist_bio')";
if($conn->query($sql)===TRUE){
	header( "location: artist_catalog.php");
}
else{
	echo "<br/>";
	echo "Error accessing database: " . $conn->error;
}
?>
