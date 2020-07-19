<?php

include_once('../config.php');

$error = array();
$teacherId = $_REQUEST['pk_id'];
$conn = connect();


$batchData = getBatchesWithTeacherID($teacherId, $conn);

while ($row = mysqli_fetch_assoc($batchData)) {
    $batches[] = $row;
}


$temp[] = $batches;
$json['batches'] = $temp;
echo json_encode($json);


?>