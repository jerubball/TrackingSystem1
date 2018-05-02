<html> 
<body>

<?php 
if (isset($_SESSION['id'])) {
$id = $_SESSION['id'];
}

$servername = "localhost:3306";
$username = "admin";
$password = "13579";
$dbname = "Child_Tracker";

$email = $_POST("email");
$conn = new mysqli($servername, $username, $password, $dbname);
$groupID = mysqli_query($conn, "SELECT Group_ID FROM account_info WHERE Google_UID = '" . $id . "'" );

 mysqli_query($conn, "UPDATE account_info SET Group_ID = '" . $groupID . "', Account_Type = Child WHERE Email = '". $email ."'); 