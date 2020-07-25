<?php

session_start ();

$db_server = "localhost";
$db_user = "tracker.local";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $lat = floatval ($_GET['lat']);
    $lon = floatval ($_GET['lon']);
    
    $conn = new mysqli ($db_server, $db_user);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
    
    $sql = "SELECT Account_ID FROM Child_Tracker.account_info WHERE Google_UID = " . $id;
    $ans = $conn -> query($sql);
    $row = mysqli_fetch_assoc($ans);
    $usr = $row['Account_ID'];
    
    $now = time();
    $sql = "INSERT INTO Child_Tracker.location VALUES ($usr, FROM_UNIXTIME($now), $lat, $lon, 'Normal')";
    $ans = $conn -> query($sql);
    //echo $id;
    $conn -> close();
}

?>
