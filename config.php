<?php

//Including Fuctions//
include_once('functions/main.php');
include_once('functions/model.php');
include_once('functions/validation.php');

function connect(){
    define("server", "localhost");
    define("usr","root");
    define("pas","");
    define("data","db_lms");
    $connection = mysqli_connect(server, usr, pas, data) or die("failed to connect to database");
    return ($connection);
}

//error_reporting(0);
?>