<?php

session_start ();

$db_server = "localhost:3306";
$db_user = "admin";
$db_pass = "13579";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $conn = new mysqli ($db_server, $db_user, $db_pass);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
    
    $sql = "SELECT COUNT(*) AS entries FROM Child_Tracker.account_info WHERE Account_Google_ID = " . $id;
    $ans = $conn -> query($sql);
    $row = mysqli_fetch_assoc($ans);
    echo $row['entries'];
}

?>