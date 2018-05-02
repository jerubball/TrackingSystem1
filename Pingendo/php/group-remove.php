<?php 
if (isset($_SESSION['id'])) {
$id = $_SESSION['id'];
}

$name = $_GET['name'];
$conn = new mysqli ($db_server, $db_user, $db_pass);
$groupID = mysqli_query($conn, "SELECT Group_ID FROM account_info WHERE Google_UID = " . $id "" );

 mysqli_query($conn, "UPDATE account_info SET Group_ID = NULL, Account_Type = NULL WHERE Group_ID = "$groupID" AND First_Name = "$name" AND Account_Type = Child");