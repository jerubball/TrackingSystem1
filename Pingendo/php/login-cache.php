<?php

session_start ();

$id = $_GET['id'];
//$token = $_GET['token'];

$_SESSION['ID'] = $id;

echo $id;

?>