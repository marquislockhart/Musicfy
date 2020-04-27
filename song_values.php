<?php
require 'db.php';
// values of 'songs' table
$song_name = $conn->real_escape_string(trim($_POST["name"]));
$song_artist = $conn->real_escape_string(trim($_POST["artist"]));
$song_album = $conn->real_escape_string(trim($_POST["album"]));
$song_runtime = $_POST["run_time"];
$explicit = $_POST["explicit"];

$sql = "insert into songs (name, artistID, albumID, run_time, explicit) values ('$song_name', '$song_artist', '$song_album', '$song_runtime', '$explicit')";
if($conn->query($sql)===TRUE){
	header( "location: song_catalog.php");
}
else{
	echo "<br/>";
	echo "Error accessing database: " . $conn->error;
}
?>
