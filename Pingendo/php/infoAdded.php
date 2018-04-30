<html>
<body>

<h1>Your Information has been updated</h1>

<?php
if(isset ($_POST("first_name")) // If the user came to this page by using edit account info
{
      $fName = $_POST["first_name"];
      $lName = $_POST["last_name"];
	  $gender = $_POST["gender"];
	  $email = $_POST["email"];
	  
	  echo "The following has been updated:" . $fName . " " . $lName . " " .$gender . " " .$email;
}   
else // User came to this page by using edit address info
{
	  $street = $_POST["first_name"];
      $city = $_POST["last_name"];
	  $city = $_POST["gender"];
	  $state = $_POST["email"];
	  $zip = $_POST("zip");
}
// leave for now require_once('../mysqli_connect.php');
//$query = "UPDATE account_Info SET first_name = $f_name, last_name = $l_name, gender = $gender, email = $email";

?>
</body>
</html>
