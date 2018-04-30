<?php

session_start ();

$id = $_SESSION['ID'];

$lat = floatval ($_GET['lat']);
$lon = floatval ($_GET['lon']);

$conn = new mysqli ("localhost:3306", "admin", "13579");

if ($conn -> connect_error) {
  die ("Connection failed: " . $conn -> connect_error);
}

$now = time();
$sql = "INSERT INTO Child_Tracker.test VALUES (DEFAULT, $id, $lat, $lon, FROM_UNIXTIME($now))";
$ans = $conn -> query($sql);
echo $id;


?>