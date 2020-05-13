<?php
// values of 'artists' table
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        require_once "db.php";
				$album_name = $conn->real_escape_string(trim($_POST["name"]));
				$album_artist = $conn->real_escape_string(trim($_POST["artist"]));
				$release_year = $_POST["release_year"];
				$genre = $_POST["genre"];
				$run_time = $_POST["run_time"];
				$imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
				$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

				$sql = "insert into albums (name, artistID, release_year, genre, run_time, imageType ,imageData) values ('$album_name', '$album_artist', '$release_year', '$genre', '$run_time', '{$imageProperties['mime']}', '{$imgData}')";
				if($conn->query($sql)===TRUE){
					header( "location: album_catalog.php");
				}
				else{
					echo "<br/>";
					echo "Error accessing database: " . $conn->error;
				}
			}
		}
?>
