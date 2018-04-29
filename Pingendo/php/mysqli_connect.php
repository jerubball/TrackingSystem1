<?php
DEFINE ('Database_USER', 'admin');
DEFINE ('Database_PASSWORD', 'admin');
DEFINE ('Database_HOST', 'him-nyit.ddns.net');
DEFINE ('Database_NAME', 'account_info');

$dbc = @mysqli_connect(Database_USER, Database_PASSWORD, Database_HOST,Database_NAME)
OR Die('cannot connect to database');

?>