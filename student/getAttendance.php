<?php

include_once('../config.php');

$error = array();
$studentId = $_REQUEST['pk_id'];
$conn = connect();

$totalClasses = (getTotalClassesByStudentID($studentId, $conn));
$attendedClasses = getPresentsByStudentID($studentId, $conn);
$absentClasses = intval($totalClasses[0]) - intval($attendedClasses[0]);
$attendancePercentage = (intval($attendedClasses[0]) * 100) / intval($totalClasses[0]);

$attendance = array(
    "total" => $totalClasses[0],
    "presents" => $attendedClasses[0],
    "absents" => $absentClasses,
    "percentage" => number_format((float)$attendancePercentage, 2, '.', '')
);

$attendanceData = getTotalAttendanceByStudentID($studentId, $conn);

while ($row = mysqli_fetch_assoc($attendanceData)) {
    $attendanceDetails[] = $row;
}

$temp[] = $attendanceDetails;
$json['attendanceDetails'] = $temp;
echo json_encode($json);

$temp1[] = $attendance;
$json1['attendance'] = $temp1;
echo json_encode($json1);


?>