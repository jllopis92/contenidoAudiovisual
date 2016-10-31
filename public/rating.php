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

if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $rate = $conn->real_escape_string($_POST['rate']);
    $user = $conn->real_escape_string($_POST['user']);
    $movie = $conn->real_escape_string($_POST['movie']);
// check if user has already rated
    $sql = "SELECT id FROM tbl_rating WHERE user_id='$user' AND movie_id='".$movie."'";
    //$sql = "SELECT `id` FROM `tbl_rating` WHERE `user_id`='" . $user . "'" AND `movie_id` = .$movie.;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id = $row;
    if ($result->num_rows > 0) {
        $sql2 = "UPDATE tbl_rating SET rate='$rate', user_id='$user', movie_id='$movie' WHERE user_id='$user' AND movie_id='".$movie."'";
        if (mysqli_query($conn, $sql2)) {
            $total = 0;
            $rateQuery = "SELECT rate FROM tbl_rating WHERE movie_id='".$movie."'";
            $result = $conn->query($rateQuery);
            //$rates = $result->fetch_assoc();
            $cant = 0;
            if ($result->num_rows > 0) {
                // output data of each row
                while($rates = $result->fetch_assoc()) {
                    $total = $total + $rates["rate"];
                    $cant++;
                }
                
                $prom = $total / $cant;
                $updateMovie = "UPDATE movies SET rating='$prom' WHERE id='".$movie."'";
                if (mysqli_query($conn, $updateMovie)) {
                    echo "Total: ".$total." Cantidad: ".$cant." actualizar con promedio ".$prom;
                }
            }
        }else{
            echo "Error";
        }
    } else {

        $sql3 = "INSERT INTO `tbl_rating` ( `rate`, `user_id`, `movie_id`) VALUES ('" . $rate . "', '" . $user . "', '" . $movie . "'); ";
        if (mysqli_query($conn, $sql3)) {
            $total = 0;
            $rateQuery = "SELECT rate FROM tbl_rating WHERE movie_id='".$movie."'";
            $result = $conn->query($rateQuery);
            //$rates = $result->fetch_assoc();
            $cant = 0;
            if ($result->num_rows > 0) {
                // output data of each row
                while($rates = $result->fetch_assoc()) {
                    $total = $total + $rates["rate"];
                    $cant++;
                }
                
                $prom = $total / $cant;
                $updateMovie = "UPDATE movies SET rating='$prom' WHERE id='".$movie."'";
                if (mysqli_query($conn, $updateMovie)) {
                    echo "Total: ".$total." Cantidad: ".$cant." insertar con promedio ".$prom;
                }
            }
        }
    }
}
$conn->close();
?>