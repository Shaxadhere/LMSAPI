<?php

include_once('../config.php');

$errors = array();

$fk_subject = $_REQUEST['fk_subject'];
$examname = clean_text($_REQUEST['examname']);
$date = $_REQUEST['date'];

if(!validateDate($date, '-')){
    array_push($errors,'Invalid date provided');
}


if(!validatePlainText($examname)){
    array_push($errors,'Exam name must be plain text');
}

if(!empty($errors)){
    $temp[] = $errors;
    $json['errors'] = $temp;
    echo json_encode($json);   
    exit(); 
}
else if(empty($errors)){
    $conn = connect();
    insertData("tbl_exam", array('fk_subject', 'examname', 'date', 'isdeleted'), array($fk_subject, $examname, $date, false), $conn);
    echo "true";
    exit();
}

echo "false";

?>