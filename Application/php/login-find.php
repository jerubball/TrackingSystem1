<?php

session_start ();

$db_server = "localhost";
$db_user = "tracker.local";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $conn = new mysqli ($db_server, $db_user);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
    
    $sql = "SELECT COUNT(*) AS entries FROM Child_Tracker.account_info WHERE Google_UID = " . $id;
    $ans = $conn -> query($sql);
    $row = mysqli_fetch_assoc($ans);
    echo $row['entries'];
    $conn -> close();
}

?>
