<?php

include_once('../config.php');

$errors = array();

$name = clean_text($_REQUEST['name']);
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

if(!validatePlainText($name)){
    array_push($errors,'Teacher name must be plain text');
}

if(!validateEmail($email)){
    array_push($errors,'Invalid email provided');
}

if(!validatePassword($password)){
    array_push($errors,'Password must be a combination of caps, smalls and numbers');
}

if(!empty($errors)){
    $temp[] = $errors;
    $json['errors'] = $temp;
    echo json_encode($json);   
    exit(); 
}
else if(empty($errors)){
    $conn = connect();
    insertData("tbl_user", array('name', 'email', 'password', 'fk_usertype', 'isdeleted'), array($name, $email, $password, 2, false), $conn);
    echo "true";
    exit();
}

echo "false";

?>