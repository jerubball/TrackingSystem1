<?php

session_start ();

$db_server = "localhost:3306";
$db_user = "admin";
$db_pass = "13579";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $first = $_GET['fname'];
    $last = $_GET['lname'];
    $email = $_GET['email'];
    $gender = $_GET['gender'];
    
    $conn = new mysqli ($db_server, $db_user, $db_pass);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
    
    $sql = "UPDATE Child_Tracker.account_info SET First_Name='$first', Last_Name='$last', Email='$email', Gender='$gender' WHERE Google_UID = ".$id;
    $ans = $conn -> query($sql);
    echo "Done".$first;
    $conn -> close();
}

?>