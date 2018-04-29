<?php
DEFINE ('Database_USER', 'admin');
DEFINE ('Database_PASSWORD', 'admin');
DEFINE ('Database_HOST', 'localhost');
DEFINE ('Database_NAME', 'userInfo');

$dbc = @mysqli_connect(Database_USER, Database_PASSWORD, Database_HOST,Database_NAME)
OR Die('cannot connect to database');

?>