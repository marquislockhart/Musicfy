<?php
// values of 'artists' table
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        require_once "db.php";
				$artist_name = $_POST["name"];
				$artist_bio = $conn->real_escape_string(trim($_POST["bio"]));
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

$sql = "insert into artists (name, bio, imageType ,imageData) values ('$artist_name', '$artist_bio', '{$imageProperties['mime']}', '{$imgData}')";
if($conn->query($sql)===TRUE){
	header( "location: artist_catalog.php");
}
else{
	echo "<br/>";
	echo "Error accessing database: " . $conn->error;
}
}
}
?>
