<?php

session_start ();

$db_server = "localhost:3306";
$db_user = "admin";
$db_pass = "13579";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $first = $_SESSION['first'];
    $last = $_SESSION['last'];
    $email = $_SESSION['email'];
    
    $conn = new mysqli ($db_server, $db_user, $db_pass);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
    
    //$sql = "INSERT INTO Child_Tracker.account_info VALUES (DEFAULT, $id, $first, $last, $email, NULL, NULL, NULL)";
    $sql = "SELECT * FROM Child_Tracker.account_info LIMIT 1";
    $ans = $conn -> query($sql);
    //echo $id." ".$first." ".$last." ".$email;
    $row = mysqli_fetch_assoc($ans);
    echo $row['Account_ID'];
    mysqli_close($conn);
}

?>