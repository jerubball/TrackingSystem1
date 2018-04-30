<html>
<body>

<h1>My First Heading</h1>
<p>My first paragraph.</p>
<?php

      $fName = $_POST["first_name"];
      $lName = $_POST["last_name"];
	  $gender = $_POST["gender"];
	  $email = $_POST["email"];
	  
	  echo "The following has been updated:" . $fName . $lName . $gender . $email;
    

// leave for now require_once('../mysqli_connect.php');
//$query = "UPDATE account_Info SET first_name = $f_name, last_name = $l_name, gender = $gender, email = $email";

?>
</body>
</html>
