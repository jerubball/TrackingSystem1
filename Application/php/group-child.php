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
    
    $sql = "SELECT Group_ID FROM Child_Tracker.account_info WHERE Google_UID = " . $id;
    $ans = $conn -> query($sql);
    if ($ans->num_rows > 0) {
        $row = $ans->fetch_assoc();
        $group = $row['Group_ID'];
        
        $sql = "SELECT First_Name FROM Child_Tracker.account_info WHERE Group_ID = '$group' AND Account_Type = 'Child'";
        $ans = $conn -> query($sql);
        
        if ($ans->num_rows > 0) {
            while($row = $ans->fetch_assoc()) {
                echo $row['First_Name'] . ";";
            }
        }
    }
    else {
        echo "No result for account.";
    }
    $conn -> close();
}

?>
