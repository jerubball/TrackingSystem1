<html> 
<body>

<?php 
if (isset($_SESSION['id'])) {
$id = $_SESSION['id'];
}


$db_server = "localhost:3306";
$db_user = "admin";
$db_pass = "13579";

$email = $_GET['email'];
$conn = new mysqli ($db_server, $db_user, $db_pass);
$groupID = mysqli_query($conn, "SELECT Group_ID FROM account_info WHERE Google_UID = " . $id" ");

 mysqli_query($conn, "UPDATE account_info SET Group_ID = " . $groupID", Account_Type = Child WHERE Email = ". $email "); 