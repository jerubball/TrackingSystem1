<?php 
require_once('../mysqli_connect.php');

$query = "INSERT INTO account_Info('First_Name','Last_Name','Gender','Email',)
	      VALUES:(?,?,?,?)"
$stmt = mysqli_prepare