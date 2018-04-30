<?php
$servername = "him-nyit.ddns.net";
$username = "admin";
$password = "13579";
$dbname = "Child_Tracker";

echo "in savesettings";
$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error);
} 
$idtoken = mysqli_real_escape_string($conn, $_POST['idtoken']);	//checking for existing account
$sql = "SELECT Account_ID FROM account_info WHERE Account_Token = '$idtoken'";
    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
    $count = mysqli_num_rows($result);
      

		
if($count == 1) {	//if the account token already exist a new entry wont be made into databse
	 header("location: main.html");
}
else{	// account saved into database
	
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);



$sql = "INSERT INTO account_info (First_Name,Last_Name,Email,Account_Token)
VALUES ('$fname', '$lname', '$email', '$idtoken') ";

if ($conn->query($sql) === TRUE) {
    echo "account created!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}

?>