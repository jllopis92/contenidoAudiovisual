<?php
/*
 *  Simple Rating System using CSS, JQuery, AJAX, PHP, MySQL
 *  Downloaded from Devzone.co.in
 */
$ipaddress = md5($_SERVER['REMOTE_ADDR']); // here I am taking IP as UniqueID but you can have user_id from Database or SESSION

$servername = "localhost"; // Server details
$username = "root";
$password = "root";
$dbname = "contenidoAudiovisual";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Unable to connect Server: " . $conn->connect_error);
}

if (isset($_POST['id']) && !empty($_POST['id'])) {

  $id = $conn->real_escape_string($_POST['id']);

// check if user has already rated
  $sql = "SELECT * FROM movie_in_playlist WHERE playlist_id = '".$id."'";
  $result = $conn->query($sql);
  //$row = $result->fetch_assoc();
  $count = $result->num_rows;
  if ($count > 0) {
    $separator = '|';
    $base = '../files/convert/videos/';
    $finalurl = "";
    while($row = $result->fetch_assoc()) {
      $moviename = $row['name'];
      $url = $base.$row['url'];
      $finalurl = $finalurl.$url.$separator.$moviename.$separator;
    }
    echo $finalurl;
    }
  }

  $conn->close();

 ?>


