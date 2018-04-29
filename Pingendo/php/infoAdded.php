<?php 

        $f_name = trim($_POST['first_name']);
        $l_name = trim($_POST['last_name']);
        $gender = trim($_POST['gender']);
        $email = trim($_POST['email']);
    

require_once('../mysqli_connect.php');
$query = "INSERT INTO account_Info('First_Name','Last_Name','Gender','Email',)
	      VALUES:(?,?,?,?)"
$stmt = mysqli_prepare($dbc, $query);
	b Blobs 

mysqli_stmt_bind_param($stmt,'ssss','f_name','l_name','gender','email')	
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($dbc);


