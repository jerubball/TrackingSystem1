<?php

session_start ();

$id = $_GET['id'];
//$token = $_GET['token'];

if ($id == "") {
    unset($_SESSION['ID']);
    echo "ID unset";
}
else if ($id == "check") {
    echo isset($_SESSION['ID']);
}
else {
    $_SESSION['ID'] = $id;
    echo $id;
}

?>