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
    return mysqli_fetch_assoc($res);
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

?>