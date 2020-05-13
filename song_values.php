<?php
require 'db.php';
if(isset($_POST['save_audio']) && $_POST['save_audio'] == "Upload Audio")
{
    $dir='audio/';
    $audio_path=$dir.basename($_FILES['audioFile']['name']);

    if(move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path))
    {
      echo 'Uploaded successfully';

			// values of 'songs' table
			$song_name = $conn->real_escape_string(trim($_POST["name"]));
			$song_artist = $conn->real_escape_string(trim($_POST["artist"]));
			$song_album = $conn->real_escape_string(trim($_POST["album"]));
			$song_runtime = $_POST["run_time"];
			$explicit = $_POST["explicit"];
			$fileName = $audio_path;
      $audio_path = $_POST["audio"];

			$sql = "insert into songs (name, artistID, albumID, run_time, explicit, filename) values ('$song_name', '$song_artist', '$song_album', '$song_runtime', '$explicit', '{$fileName}')";
			if($conn->query($sql)===TRUE){
				header( "location: song_catalog.php");
			}
			else {
				echo "<br/>";
				echo "Error accessing database: " . $conn->error;
			}

    }
}
?>
