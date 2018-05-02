<?php

session_start ();

$db_server = "localhost:3306";
$db_user = "admin";
$db_pass = "13579";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $name = $_GET['name'];
    
    $conn = new mysqli ($db_server, $db_user, $db_pass);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
    
    if ($name == "") {
        $sql = "SELECT * FROM Child_Tracker.account_info WHERE Google_UID = " . $id;
        $ans = $conn -> query($sql);
        if ($ans->num_rows > 0) {
            $row = $ans->fetch_assoc();
            $usr = $row['Account_ID'];
            
            //$sql = "SELECT COUNT(*) AS num FROM Child_Tracker.location WHERE Account_ID = " . $usr;
            //$ans = $conn -> query($sql);
            //$row = mysqli_fetch_assoc($ans);
            //$num = intval($row['num']);
            
            $sql = "SELECT * FROM Child_Tracker.location WHERE Account_ID = " . $usr;
            $ans = $conn -> query($sql);
            if ($ans->num_rows > 0) {
                while($row = $ans->fetch_assoc()) {
                    echo $row['Latitude'] . "," . $row['Longitude'] . "," . $row['Time'] . ";";
                }
            }
            else {
                echo "No result for Location.";
            }
        }
    }
    else {
        $sql = "SELECT * FROM Child_Tracker.account_info WHERE Google_UID = " . $id;
        $ans = $conn -> query($sql);
        if ($ans->num_rows > 0) {
            $row = $ans->fetch_assoc();
            $group = $row['Group_ID'];
            
            $sql = "SELECT * FROM Child_Tracker.account_info WHERE Group_ID = '$group' AND First_Name = '$name' AND Account_Type = 'Child'";
            $ans = $conn -> query($sql);
            if ($ans->num_rows > 0) {
                $row = $ans->fetch_assoc();
                $usr = $row['Account_ID'];
                
                //$sql = "SELECT COUNT(*) AS num FROM Child_Tracker.location WHERE Account_ID = " . $usr;
                //$ans = $conn -> query($sql);
                //$row = mysqli_fetch_assoc($ans);
                //$num = intval($row['num']);
                
                $sql = "SELECT * FROM Child_Tracker.location WHERE Account_ID = " . $usr;
                $ans = $conn -> query($sql);
                if ($ans->num_rows > 0) {
                    while($row = $ans->fetch_assoc()) {
                        echo $row['Latitude'] . "," . $row['Longitude'] . "," . $row['Time'] . ";";
                    }
                }
                else {
                    echo "No result for Location.";
                }
            }
        }
    }
    $conn -> close();
}


?>