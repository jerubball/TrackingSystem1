<?php

session_start ();

$id = $_SESSION['id'];
$first = $_SESSION['first'];
$last = $_SESSION['last'];
$email = $_SESSION['email'];

echo $first." ".$last;

?>