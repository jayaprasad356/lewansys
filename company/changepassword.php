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

if (empty($_POST['currentpwd'])) {
    $response['success'] = false;
    $response['message'] = "Current Password should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['newpwd'])) {
    $response['success'] = false;
    $response['message'] = "New Password should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['retypepwd'])) {
    $response['success'] = false;
    $response['message'] = "Retype Password should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['id'])) {
    $response['success'] = false;
    $response['message'] = "ID should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['password'])) {
    $response['success'] = false;
    $response['message'] = "Password should be filled!";
    print_r(json_encode($response));
    return false;
}
$id = $db->escapeString($_POST['id']);
$currentpwd = $db->escapeString($_POST['currentpwd']);
$newpwd = $db->escapeString($_POST['newpwd']);
$retypepwd = $db->escapeString($_POST['retypepwd']);
$password = $db->escapeString($_POST['password']);

if(($currentpwd != $password)){
    $response['success'] = false;
    $response['message'] = "Current Password is Wrong";
    print_r(json_encode($response));
    
}
else if(($newpwd != $retypepwd)){
    $response['success'] = false;
    $response['message'] = "Password Does not Match";
    print_r(json_encode($response));
    
}
else{
    $sql = "UPDATE company SET password = '$newpwd' WHERE id = '" . $id . "'";
    $db->sql($sql);
    $response['success'] = true;
    $response['message'] = "Password Changed successfully";
    print_r(json_encode($response));

    

}


?>