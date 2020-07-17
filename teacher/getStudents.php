<?php

include_once('../config.php');

$error = array();
$batchId = $_REQUEST['batchId'];
$conn = connect();

$students = getStudentWithBatchId($batchId, $conn);
$temp[] = $students;
$json['students'] = $temp;
echo json_encode($json);

?>