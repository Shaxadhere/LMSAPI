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

//Get User Data//
function getAdmin(string $username, string $password, $conn){
    $res = mysqli_query($conn, "select * from tbl_admin where Username = $username and Password = $password");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return $res;
}

//Get User Email//
function getContact(string $username, $conn){
    $res = mysqli_query($conn, "select `PK_ID`, `Email`, `FullName` from tbl_user where Username = $username");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return mysqli_fetch_array($res);
}

//Filter User//
function filterUser($id, $conn){
    $res = mysqli_query($conn, "select * from tbl_user where PK_ID = $id");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return mysqli_fetch_array($res);
}

?>