<?php

session_start ();

$db_server = "localhost:3306";
$db_user = "tracker";
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
        $group = $row['Group_ID'];
        
        if ($group == "") {
            echo false;
        }
        else {
            echo true;
        }
    } else {
        echo "No result for account.";
    }
    $conn -> close();
}

?>