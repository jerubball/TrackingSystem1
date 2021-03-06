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
    
    $sql = "SELECT * FROM Child_Tracker.account_info WHERE Google_UID = " . $id;
    $ans = $conn -> query($sql);
    if ($ans->num_rows > 0) {
        $row = $ans->fetch_assoc();
        $group = $row['Group_ID'];
        
        $sql = "SELECT * FROM Child_Tracker.family_group WHERE Group_ID = " . $group;
        $ans = $conn -> query($sql);
        if ($ans->num_rows > 0) {
            $row = $ans->fetch_assoc();
            $street = $row['Street_Address'];
            $city = $row['City_Address'];
            $state = $row['State_Address'];
            $zip = $row['Zip_Address'];
            echo $street . ";" . $city . ";" . $state . ";" . $zip;
        }
        else {
            echo "No result for group.";
        }
    } else {
        echo "No result for account.";
    }
    $conn -> close();
}

?>
