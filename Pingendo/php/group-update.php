<?php

session_start ();

$db_server = "localhost:3306";
$db_user = "admin";
$db_pass = "13579";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $street = $_GET['street'];
    $city = $_GET['city'];
    $state = $_GET['state'];
    $zip = $_GET['zip'];
    
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
            $sql = "INSERT INTO Child_Tracker.family_group VALUES (DEFAULT, '$street', '$city', '$state', '$zip')";
            $ans = $conn -> query($sql);
            
            $sql = "SELECT * FROM Child_Tracker.account_info WHERE Google_UID = " . $id;
            $ans = $conn -> query($sql);
            if ($ans->num_rows > 0) {
                $row = $ans->fetch_assoc();
                $group = $row['Group_ID'];
                echo "$group";
                $sql = "UPDATE Child_Tracker.account_info SET Group_ID=$group WHERE Google_UID = ".$id;
                $ans = $conn -> query($sql);
            }
            else {
                echo "Error adding account.";
            }
        }
        else {
            $sql = "UPDATE Child_Tracker.family_group SET Street_Address='$street', City_Address='$city', State_Address='$state', Zip_Address=$zip WHERE Group_ID = ".$group;
            $ans = $conn -> query($sql);
        }
    } else {
        echo "No result for account.";
    }
    $conn -> close();
}

?>