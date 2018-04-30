<?php

session_start ();

$id = $_GET['id'];
$first = $_GET['first'];
$last = $_GET['last'];
$email = $_GET['email'];

$_SESSION['id'] = $id;
$_SESSION['first'] = $first;
$_SESSION['last'] = $last;
$_SESSION['email'] = $email;

echo $id;

?>