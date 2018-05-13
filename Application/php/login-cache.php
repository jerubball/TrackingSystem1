<?php

session_start ();

$id = $_GET['id'];
//$token = $_GET['token'];

if ($id == "") {
    unset($_SESSION['id']);
    echo "ID unset";
}
else if ($id == "check") {
    if (isset($_SESSION['id'])) {
        echo true;
    }
    else {
        echo false;
    }
}
else {
    $_SESSION['id'] = $id;
    echo $id;
}

?>