<?php

session_start ();

$db_server = "localhost";
$db_user = "root";
$db_pass = "";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $street = $_GET['streetAdd'];
    $city = $_GET['cityAdd'];
    $state = $_GET['stateAdd'];
    $zip = $_GET['zipAdd'];
    
    $conn = new mysqli ($db_server, $db_user, $db_pass);
    
    if ($conn -> connect_error) {
      die ("Connection failed: " . $conn -> connect_error);
    }
	
    $asql = "SELECT * FROM Child_Tracker.account_info WHERE Google_UID = " . $id . " & Group_ID = NULL ";
    $aans = $conn -> query($asql);
	
    if ($aans->num_rows > 0) {
	$sql = "INSERT INTO child_tracker.family_group(Group_ID,Street_Address, City_Address, State_Address, Zip_Address)
              VALUES(DEFAULT, '$street', '$city', '$state', '$zip');";
	$ans = $conn -> query($sql);
	
	$ssql = "UPDATE child_tracker.account_info SET Group_ID = LAST_INSERT_ID() WHERE Google_UID = ".$id;
	$sans = $conn -> query($ssql);
	}
	else{
		echo ('else');
		//$xsql = "SET SQL_SAFE_UPDATES = 0;";		had a error but it seems fixed even without
		//$xans = $conn -> query($xsql);			it said something about safety
		$sql = "UPDATE child_tracker.family_group SET Street_Address = '$street' , 
		City_Address = '$city' , State_Address = '$state', Zip_Address = '$zip' WHERE Group_ID 
		IN ( SELECT Group_ID from child_tracker.account_info WHERE Google_UID = " . $id . " );" ;
		$ans = $conn -> query($sql);
		//$ssql = "SET SQL_SAFE_UPDATES = 1;";
		//$sans = $conn -> query($ssql);
	}
		
    
    $conn -> close();
}

?>