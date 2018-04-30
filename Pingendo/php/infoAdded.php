<html>
<body>

<h1>Your Information has been updated</h1>

<?php
if(isset ($_POST("first_name"))) // If the user came to this page by using edit account info
{
      $fName = $_POST["first_name"];
      $lName = $_POST["last_name"];
	  $gender = $_POST["gender"];
	  $email = $_POST["email"];
	  $number = $_POST("number");
	  echo "The following has been updated:" . $fName . " " . $lName . " " .$gender . " " .$email." ". $number;
}   
else // User came to this page by using Create Group
{
	  $street = $_POST["street"];
      $city = $_POST["city"];
	  $state = $_POST["state"];
	  $zip = $_POST("zip");
	  echo "The following has been updated:" . $street . " " . $city . " " .$state . " " .$zip;
	  mysqli_query($dbc, "INSERT INTO family_group(Street_Address, City_Address, State_Address, Zip_Address)
						  VALUES(" . $street .", ". $city . ", " . $state . ", " . $zip . ")")
}

?>
</body>
</html>
