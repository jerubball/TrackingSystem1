<html>
<body>

<h1>Your Information has been updated</h1>

<?php
if($_POST("first_name")!== null) // If the user came to this page by using edit account info
{
      $fName = $_POST["first_name"];
      $lName = $_POST["last_name"];
	  $gender = $_POST["gender"];
	  $email = $_POST["email"];
	  echo "The following has been updated:" . $fName . " " . $lName . " " .$gender . " " .$email;
	  mysqli_query($dbc, "UPDATE INTO account_info( First_Name, Last_Name, Email, Gender)
						  VALUES(" . $fName . ", " . $lName . ", " . $email . ", " . $gender . ",)");
}
else // User came to this page by using Create Group
{
	  $street = $_POST["street"];
      $city = $_POST["city"];
	  $state = $_POST["state"];
	  $zip = $_POST("zip");
	  echo "The following has been updated:" . $street . " " . $city . " " .$state . " " .$zip;
	 mysqli_query($dbc, "INSERT INTO family_group(Group_ID,Street_Address, City_Address, State_Address, Zip_Address)
              VALUES(DEFAULT, " . $street .", ". $city . ", " . $state . ", " . $zip . ")");
}

?>
</body>
</html>
