<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "musicfy");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //check if two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) {
      //define other variables with submitted values from $_POST
      $fname = $mysqli->real_escape_string($_POST['fname']);
      $lname = $mysqli->real_escape_string($_POST['lname']);
      $username = $mysqli->real_escape_string($_POST['username']);
      $email = $mysqli->real_escape_string($_POST['email']);
      $password = md5($_POST['password']); //md5 hash password for security

          $_SESSION['username'] = $username;

          //create SQL query string for inserting data into the database
          $sql = "INSERT INTO users (fname, lname, username, email, password)"
          . "VALUES ('$fname', '$lname', '$username', '$email', '$password')";

          //check if mysql query is successful
          if ($mysqli->query($sql) === true) {
            $_SESSION[ 'message' ] = "Registration succesful! Added $username to the database!";
            //redirect the user to welcome.php
            header( "location: welcome.php" );
          }
          else {
            $_SESSION['message'] = 'User could not be added to the database!';
          }
    }
    else {
      $_SESSION['message'] = 'Two passwords do not match!';
    }
}
?>
<div class="body-content">
  <div class="module">
    <h1>Create an Account</h1>
    <form class="form" action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="First Name" name="fname" required />
      <input type="text" placeholder="Last Name" name="lname" required />
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
