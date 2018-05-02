<?php

session_start ();

$db_server = "localhost:3306";
$db_user = "admin";
$db_pass = "13579";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $email = $_GET("email");
    
    $conn = new mysqli ($db_server, $db_user, $db_pass);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
    
    $sql = "SELECT Group_ID FROM Child_Tracker.account_info WHERE Google_UID = " . $id;
    $ans = $conn -> query($sql);
    if ($ans->num_rows > 0) {
        $row = $ans->fetch_assoc();
        $group = $row['Group_ID'];
        
        $sql = "UPDATE Child_Tracker.account_info SET Group_ID = '$groupID', Account_Type = 'Child' WHERE Email = '$email";
        $ans = $conn -> query($sql);
        
        echo "Child Added.";
    }
    else {
        echo "No result for account.";
    }
    $conn -> close();
}

?>