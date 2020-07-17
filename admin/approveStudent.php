<?php

include_once('../config.php');

$errors = array();

$studentId = $_REQUEST['pk_id'];

if(!empty($errors)){
    $temp[] = $errors;
    $json['errors'] = $temp;
    echo json_encode($json);   
    exit(); 
}
else if(empty($errors)){
    $conn = connect();
    editData("tbl_user", array("status", 1), "pk_id", $studentId, $conn);
    echo "true";
    exit();
}

echo "false";


?>