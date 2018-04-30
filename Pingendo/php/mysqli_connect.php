<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "child_tracker";


$dbc = @mysqli_connect(servername, username, password, dbname)
OR Die('cannot connect to database');

?>