<?php

session_start ();

$id = intval ($_GET['id']);
//$token = $_GET['token'];

$_SESSION['ID'] = $id;

?>