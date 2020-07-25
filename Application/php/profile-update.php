<?php

session_start ();

$db_server = "localhost";
$db_user = "tracker.local";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $first = $_GET['fname'];
    $last = $_GET['lname'];
    $email = $_GET['email'];
    $gender = $_GET['gender'];
    
    $conn = new mysqli ($db_server, $db_user);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
    
    $sql = "UPDATE Child_Tracker.account_info SET First_Name='$first', Last_Name='$last' WHERE Google_UID = ".$id;
    $ans = $conn -> query($sql);
    
    if ($gender !== "") {
        $sql = "UPDATE Child_Tracker.account_info SET Gender='$gender' WHERE Google_UID = ".$id;
        $ans = $conn -> query($sql);
    }
    
    //$sql = "UPDATE Child_Tracker.account_info SET Email='$email' WHERE Google_UID = ".$id;
    //$ans = $conn -> query($sql);
    
    echo "$id";
    
    $conn -> close();
}

?>
