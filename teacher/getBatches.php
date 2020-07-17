<?php

include_once('../config.php');

$error = array();
$teacherId = $_REQUEST['pk_id'];
$conn = connect();

$batches = getBatchesWithTeacherID($teacherId, $conn);
$temp[] = $batches;
$json['batches'] = $temp;
echo json_encode($json);


?>