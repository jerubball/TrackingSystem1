<html>
<body>

<h1>Your Information has been updated</h1>

<?php
$servername = "localhost:3306";
$username = "admin";
$password = "13579";
$dbname = "Child_Tracker";
/* my db arguments.
// localhost seems to work. port number is important.
$db_server = "localhost:3306";
$db_user = "admin";
$db_pass = "13579";
*/
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST["send"]))// User came to this page by using Create Group 
{
	  $street = $_POST["street"];
      $city = $_POST["city"];
	  $state = $_POST["state"];
	  $zip = $_POST["zip"];
	  echo "The following has been updated:" . $street . " " . $city . " " .$state . " " .$zip;
	 mysqli_query($conn, "INSERT INTO family_group(Group_ID,Street_Address, City_Address, State_Address, Zip_Address)
              VALUES(DEFAULT, " . $street .", ". $city . ", " . $state . ", " . $zip . ")");
      
}
else // If the user came to this page by using edit account info
{
	  $fName = $_POST["first_name"];
      $lName = $_POST["last_name"];
	  $gender = $_POST["gender"];
	  $email = $_POST["email"];
	  echo "The following has been updated:" . $fName . " " . $lName . " " .$gender . " " .$email;
	  mysqli_query($conn, "UPDATE INTO account_info( First_Name, Last_Name, Email, Gender)
						  VALUES(" . $fName . ", " . $lName . ", " . $email . ", " . $gender . ",)");
}

/**

// start new connection
    $conn = new mysqli ($db_server, $db_user, $db_pass);

// this check for bad connection.
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }

// ignore this. this is variable for location DB.
    $now = time();

// this part just sets sql statement as string variable.
    $sql = "INSERT INTO Child_Tracker.location VALUES ($usr, FROM_UNIXTIME($now), $lat, $lon, 'Normal')";

// ths part actually executes sql statement.
    $ans = $conn -> query($sql);
    //echo $id;

// it is recommended to close connection after connection.
    mysqli_close($conn);

*/

?>
</body>
</html>
