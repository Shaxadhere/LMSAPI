<?php

include_once('../config.php');

$errors = array();

$subject = $_REQUEST['subject'];

if(!validatePlainText($subject)){
    array_push($errors,'Subject name must be plain text');
}
if(!empty($errors)){
    $temp[] = $errors;
    $json['errors'] = $temp;
    echo json_encode($json);   
    exit(); 
}
else if(empty($errors)){
    $conn = connect();
    insertData("tbl_subject", array('subjectname', 'isdeleted'), array($subject, false), $conn);
    echo "true";
    exit();
}

echo "false";
?>