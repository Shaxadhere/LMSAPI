<?php

include_once('../config.php');

$errors = array();

$studentId= $_REQUEST['pk_id'];
$date = $_REQUEST['date'];
$status = $_REQUEST['status'];


if(empty($date) && validateDate($date, "-")){
    array_push($errors, 'Please enter a valid date');
}


for ($i=0; $i < sizeof($studentId); $i++) { 
    if(empty($status)){
        array_push($errors, 'Please enter attandance status');
    }
}

if(!empty($errors)){
    $temp[] = $errors;
    $json['errors'] = $temp;
    echo json_encode($json);   
    exit(); 
}
else if(empty($errors)){
    $conn = connect();

    

    for ($i=0; $i < sizeof($studentId); $i++) { 
        insertData(
            "tbl_attendance",
            array(
                'fk_user',
                'date',
                'status',
                'isdeleted'
            ),
            array(
                $studentId[$i],
                $date,
                $status[$i],
                false
            ),
            $conn
        );
    }

    echo "true";
    exit();
}

echo "false";

?>