<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once('../includes/crud.php');
$db = new Database();
$db->connect();

if (empty($_POST['username'])) {
    $response['success'] = false;
    $response['message'] = "UserName should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['email'])) {
    $response['success'] = false;
    $response['message'] = "Email should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['password'])) {
    $response['success'] = false;
    $response['message'] = "Password should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['type'])) {
    $response['success'] = false;
    $response['message'] = "Choose Type";
    print_r(json_encode($response));
    return false;
}
$username = $db->escapeString($_POST['username']);
$email = $db->escapeString($_POST['email']);
$password = $db->escapeString($_POST['password']);
$type = $db->escapeString($_POST['type']);

if(($_POST['type'] == 'college') || $_POST['type'] == 'institution'){
    $sql = "INSERT INTO college_institution(`username`,`email`, `password`, `type`)VALUES('$username','$email','$password','$type')";
    $db->sql($sql);

    $response['success'] = true;
    $response['message'] = "User registered successfully";
    print_r(json_encode($response));

}
else if($_POST['type'] == 'company'){
    $sql = "INSERT INTO company(`username`,`email`, `password`)VALUES('$username','$email','$password')";
    $db->sql($sql);

    $response['success'] = true;
    $response['message'] = "User registered successfully";
    print_r(json_encode($response));

}

else if($_POST['type'] == 'student'){
    $sql = "INSERT INTO student(`username`,`email`, `password`)VALUES('$username','$email','$password')";
    $db->sql($sql);

    $response['success'] = true;
    $response['message'] = "User registered successfully";
    print_r(json_encode($response));

}


?>