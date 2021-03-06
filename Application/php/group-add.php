<?php

session_start ();

$db_server = "localhost";
$db_user = "tracker.local";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $email = $_GET['email'];
    
    $conn = new mysqli ($db_server, $db_user);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
    
    $sql = "SELECT Group_ID FROM Child_Tracker.account_info WHERE Google_UID = " . $id;
    $ans = $conn -> query($sql);
    if ($ans->num_rows > 0) {
        $row = $ans->fetch_assoc();
        $group = $row['Group_ID'];
        
        $sql = "SELECT * FROM Child_Tracker.account_info WHERE Email = '$email'";
        $ans = $conn -> query($sql);
        if ($ans->num_rows > 0) {
            $row = $ans->fetch_assoc();
            $target = $row['Group_ID'];
            
            if ($target == "") {
                $sql = "UPDATE Child_Tracker.account_info SET Group_ID = '$group', Account_Type = 'Child' WHERE Email = '$email'";
                $ans = $conn -> query($sql);
            }
            else {
                echo "Account already belongs to group.";
            }
        }
        else {
            echo "No such account.";
        }
        
        echo "Child Added.";
    }
    else {
        echo "No result for account.";
    }
    $conn -> close();
}

?>
