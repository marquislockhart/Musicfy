<?php
$connect = mysqli_connect("localhost", "root", "", "musicfy");
$output = '';
if(isset($_POST["query"]))
{
  $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $query = " SELECT * FROM songs
  WHERE name LIKE '%".$search."%'
  OR artistID LIKE '%".$search."%'
  OR albumID LIKE '%".$search."%'
  ";
}
else
{
 $query = "SELECT * FROM name ORDER BY ASC";
}
$result = mysqli_query($connect, $query) or die("");

if(mysqli_num_rows($result) > 0)
{
  $output .= '
  <div class="table-responsive">
  <table class="table table bordered">
  <tr>
    <th>Song</th>
    <th>Artist</th>
    <th>Album</th>
  </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
    $output .= '
    <tr>
      <td>'.$row["name"].'</td>
      <td>'.$row["artistID"].'</td>
      <td>'.$row["albumID"].'</td>
   </tr>
   ';
 }
 echo $output;
}
else
{
  echo 'No songs found.';
}
?>
