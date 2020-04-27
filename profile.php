<?php
$_SESSION['email'] = $user['email'];
$_SESSION['username'] = $user['username'];
$_SESSION['active'] = $user['active'];

// This is how we'll know the user is logged in
$_SESSION['logged_in'] = true;

header("location: profile.php");
?>
