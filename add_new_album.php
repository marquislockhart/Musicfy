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
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="add_new_song.php">Add Songs</a></li>
        <li><a href="add_new_artist.php">Add Artists</a></li>
        <li class="active"><a href="add_new_album.php">Add Albums</a></li>
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
      <h1>Add a New Album</h1>
        <form name="frmImage" enctype="multipart/form-data" action = "album_values.php" method="post" class="frmImageUpload">
            Album Name: <input type = "text" name = "name"><br>
            Artist(ID): <input type = "text" name = "artist"><br>
            Release Year: <input type = "text" name = "release_year"><br>
            Genre: <input type = "text" name = "genre"><br>
            Run Time: <input type = "text" name = "run_time"><br>
            <label>Upload Image File:</label><br /> <input name="userImage"
                type="file" class="inputFile" />
            <input type = 'submit' value="Submit" class="btnSubmit"></input>
        </form>
    </body>

    </html>
