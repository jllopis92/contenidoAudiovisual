<?php

$ipaddress = md5($_SERVER['REMOTE_ADDR']); // here I am taking IP as UniqueID but you can have user_id from Database or SESSION

$servername = "localhost"; // Server details
$username = "root";
$password = "root";
$dbname = "contenidoAudiovisual";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Unable to connect Server: " . $conn->connect_error);
}
if (isset($_POST['visits']) && !empty($_POST['visits'])) {

    $visits = $conn->real_escape_string($_POST['visits']);
    $movie = $conn->real_escape_string($_POST['movie']);
    $user = $conn->real_escape_string($_POST['user']);
   
// check if user has already rated
    $sql = "SELECT visit FROM movies WHERE id='".$movie."'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id = $row;
    if ($result->num_rows > 0) {
        $visits = $visits + $row["visit"];
         $insertsql = "UPDATE movies SET visit='$visits' WHERE id='".$movie."'";
        if (mysqli_query($conn, $insertsql)) {
            $insertsql2 = " INSERT INTO SeenBy (movie_id, user_id) VALUES (".$movie.",".$user.");";
            if (mysqli_query($conn, $insertsql2)) { 
                echo "Correcto";
            }
        }else{
            echo "Nuevas Visitas: ".$visits;
        }
    } else {
        echo "Error";
    }
}
$conn->close();
?>