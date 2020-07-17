<?php 

include_once("../config.php");

$Email = $_REQUEST["email"];
$Password = $_REQUEST["password"];
$conn = connect();

$authUser = mysqli_fetch_assoc(getUser($Email, $Password, $conn));

$temp[] = $authUser;


if(isset($authUser)){
    $json['users'] = $temp;
    echo json_encode($json);

}
else{
    echo "false";
}
?>
