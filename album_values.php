<?php
require 'db.php';
// values of 'artists' table
$album_name = $conn->real_escape_string(trim($_POST["name"]));
$album_artist = $conn->real_escape_string(trim($_POST["artist"]));
$release_year = $_POST["release_year"];
$genre = $_POST["genre"];
$run_time = $_POST["run_time"];


$sql = "insert into albums (name, artistID, release_year, genre, run_time) values ('$album_name', '$album_artist', '$release_year', '$genre', '$run_time')";
if($conn->query($sql)===TRUE){
	header( "location: album_catalog.php");
}
else{
	echo "<br/>";
	echo "Error accessing database: " . $conn->error;
}
?>
