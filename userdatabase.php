<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/search.css">
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Musicfy</title>
  <!-- Bootstrap Navbar & hides modals -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- opens navabar_modals -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Musicfy</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add_new_song.php">Add Songs</a></li>
          <li><a href="add_new_artist.php">Add Artists</a></li>
          <li><a href="add_new_album.php">Add Albums</a></li>
          <li class="active"><a href="userdatabase.php">User Database</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Browse
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="song_catalog.php">Songs</a></li>
          <li><a href="artist_catalog.php">Artists</a></li>
          <li><a href="album_catalog.php">Albums</a></li>
        </ul>
      </li>
      <li><a href="playlist.php">My Playlist</a></li>
    </ul>
  </div>
</nav>
<h1>User Database</h1>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th style='width:75px;'>User ID</th>
      <th style='width:200px;'>First Name</th>
      <th style='width:200px;'>Last Name</th>
      <th style='width:200px;'>Username</th>
      <th style='width:350px;'>Email Address</th>
      <th style='width:50px;'>Password</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "musicfy";

    //create connnection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //check connnection
    if($conn->connect_error){
      die("Error accessing database: " . $conn->connect_error);
    }

// -- code for pagination --
    //get current page number
    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
      $page_no = $_GET['page_no'];
    }
    else {
      $page_no = 1;
    }

    //SET total records per page
    $total_records_per_page = 10;

    //calculate offset value and set other variables
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    //get total number of pages for pagination
    $result_count = mysqli_query($conn,
    "SELECT COUNT(*) As total_records FROM users");

    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total pages minus 1

    //sql query for fetching limited records
    $result = mysqli_query($conn,
    "SELECT * FROM users LIMIT $offset, $total_records_per_page");

    while($row = mysqli_fetch_array($result)){
      echo "<tr>
      <td>".$row['id']."</td>
      <td>".$row['fname']."</td>
      <td>".$row['lname']."</td>
      <td>".$row['username']."</td>
      <td>".$row['email']."</td>
      <td>".$row['password']."</td>
      </tr>";
    }

    mysqli_close($conn);
    ?>
  </tbody>
</table>
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
  <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
<ul class="pagination">
  <?php if($page_no > 1){
    echo "<li><a href='?page_no=1'>First Page</a></li>";
  }
  ?>

  <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){
      echo "href='?page_no=$previous_page'";
    } ?>>Previous</a>
  </li>

  <li>
    <?php if ($total_no_of_pages <= 10){
      for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
        if ($counter == $page_no) {
          echo "<li class='active'><a>$counter</a></li>";
        }
        else{
          echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
      }
    } ?>
  </li>

  <li <?php if($page_no >= $total_no_of_pages){
    echo "class='disabled'";
  } ?>>
  <a <?php if($page_no < $total_no_of_pages) {
    echo "href='?page_no=$next_page'";
  } ?>>Next</a>
</li>

<?php if($page_no < $total_no_of_pages){
  echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
} ?>
</ul>
