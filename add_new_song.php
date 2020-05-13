<!-- Bootstrap Navbar -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-default">
<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="index.php">Musicfy</a>
  </div>
  <ul class="nav navbar-nav">
    <li><a href="index.php">Home</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" class="active" data-toggle="dropdown" href="#">Admin
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li class="active"><a href="add_new_song.php">Add Songs</a></li>
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
        <li><a href="album_catalog.php">Albums</a></li>
      </ul>
    </li>
  </ul>
</div>
</nav>
<body>
  <h1>Add a New Song</h1>
    <form action = "song_values.php" method="post" enctype="multipart/form-data">
        Song Name: <input type = "text" name = "name"><br>
        Artist: <input type = "text" name = "artist"><br>
        Album: <input type = "text" name = "album"><br>
        Run Time: <input type = "text" name = "run_time"><br>
        Explicit: <input type = "text" name = "explicit"><br>
        <input type="file" name="audioFile"/>
        <input type="submit" value="Upload Audio" name="save_audio"/>
    </form>
    </body>
</html>
