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
    
    $sql = "SELECT * FROM Child_Tracker.account_info WHERE Google_UID = " . $id;
    $ans = $conn -> query($sql);
    if ($ans->num_rows > 0) {
        $row = $ans->fetch_assoc();
        $first = $row['First_Name'];
        $last = $row['Last_Name'];
        $email = $row['Email'];
        $gender = $row['Gender'];
        $type = $row['Account_Type'];
        echo $first . ";" . $last . ";" . $email . ";" . $gender . ";" . $type;
    } else {
        echo "No result for account.";
    }
    $conn -> close();
}

?>