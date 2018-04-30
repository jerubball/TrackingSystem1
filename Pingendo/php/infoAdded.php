<html>
<body>

<h1>Your Information has been updated</h1>

<?php

      $fName = $_POST["first_name"];
      $lName = $_POST["last_name"];
	  $gender = $_POST["gender"];
	  $email = $_POST["email"];
	  
	  echo "The following has been updated:" . $fName . " " . $lName . " " .$gender . " " .$email;
    

// leave for now require_once('../mysqli_connect.php');
//$query = "UPDATE account_Info SET first_name = $f_name, last_name = $l_name, gender = $gender, email = $email";

?>
</body>
</html>
