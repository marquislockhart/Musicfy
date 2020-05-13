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
          <li><a href="userdatabase.php">User Database</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Browse
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="song_catalog.php">Songs</a></li>
          <li><a href="artist_catalog.php">Artists</a></li>
          <li class="active"><a href="album_catalog.php">Albums</a></li>
        </ul>
      </li>
      <li><a href="playlist.php">My Playlist</a></li>
    </ul>
  </div>
</nav>
<head>

<h1>Album Catalog</h1>
<!-- search function -->
<div class="container">
  <br/>
<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon">Search</span>
    <input type="text" name="search_text" id="search_text" placeholder="Search for an album" class="form-control" />
  </div>
</div><br/>
  <div id="result"></div>
</div>
<script>
$(document).ready(function() {
  load_data();

 function load_data(query) {
   $.ajax( {
     url:"album_search.php",
     method:"POST",
     data:{query:query},
     success:function(data)
     {
       $('#result').html(data);
     }
   });
 }
 $('#search_text').keyup(function() {
   var search = $(this).val();
   if(search != '')
   {
     load_data(search);
   }
   else
   {
     load_data();
   }
 });
});
</script>

</head>
