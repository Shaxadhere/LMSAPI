<?php

include_once('../config.php');

$error = array();
$teacherId = $_REQUEST['pk_id'];
$studentId = $_REQUEST['studentId'];
$examId = $_REQUEST['examId'];
$totalmarks = $_REQUEST['totalmarks'];
$gainedmarks = $_REQUEST['gainedmarks'];
$date = $_REQUEST['date'];

$conn = connect();


for ($i=0; $i < sizeof($studentId); $i++) { 
    if((($gainedmarks[$i] * $totalmarks) / 100) > 39){
        $status = "Pass";
    }
    else{
        $status = "Fail";
    }
    insertData(
        "tbl_studentexam",
        array
        (
            'fk_exam',
            'fk_teacher',
            'fk_student',
            'totalmarks',
            'gainedmarks',
            'date',
            'status',
            'isdeleted'
        ),
        array(
            $examId,
            $teacherId,
            $studentId[$i],
            $totalmarks,
            $gainedmarks[$i],
            $date,
            $status,
            0

        ),
        $conn
    );
}
echo "true";

?>