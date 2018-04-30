<?php

session_start ();

$db_server = "localhost:3306";
$db_user = "admin";
$db_pass = "13579";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $lat = floatval ($_GET['lat']);
    $lon = floatval ($_GET['lon']);
    
    $conn = new mysqli ($db_server, $db_user, $db_pass);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
    
    $now = time();
    $sql = "INSERT INTO Child_Tracker.test VALUES (DEFAULT, $id, $lat, $lon, FROM_UNIXTIME($now))";
    $ans = $conn -> query($sql);
    echo $id;
    mysqli_close($conn);
}

?>