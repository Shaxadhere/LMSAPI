<?php

//Get User Data//
function getUser(string $email, string $password, $conn){
    $res = mysqli_query($conn, "select `pk_id`, `name`, `email`, `fk_usertype`, `isdeleted` FROM `tbl_user` where email = $email and password = $password");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return $res;
}

//Get Batches With Teacher ID//
function getBatchesWithTeacherID($teacherId, $conn){
    $res = mysqli_query($conn, "select pk_id, batch_id from tbl_batch where teacherId = $teacherId");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return $res;
}

//Get Students With Batch ID//
function getStudentWithBatchId($batchId, $conn){
    $res = mysqli_query($conn, "select `pk_id`, `name` FROM `tbl_user` WHERE batchId = $batchId and isdeleted = false and status = true");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return mysqli_fetch_assoc($res);
}

//Get Total Attendance Days By Student ID//
function getTotalClassesByStudentID($studentId, $conn){
    $res = mysqli_query($conn, "select count(fk_user) from tbl_attendance where fk_user = $studentId");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return mysqli_fetch_array($res);
}

//Get Presents By Student ID//
function getPresentsByStudentID($studentId, $conn){
    $res = mysqli_query($conn, "SELECT count(fk_user) from tbl_attendance where fk_user = $studentId and tbl_attendance.status = 'present'");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return mysqli_fetch_array($res);
}

//Get Total Attendance By Student ID//
function getTotalAttendanceByStudentID($studentId, $conn){
    $res = mysqli_query($conn, "SELECT `pk_id`, `date`, `status` FROM `tbl_attendance` WHERE fk_user = $studentId and isdeleted = false limit 10");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return ($res);
}

?>