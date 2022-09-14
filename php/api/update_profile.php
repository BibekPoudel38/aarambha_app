<?php
include_once('conn.php');
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $email = $_POST['email'] ?? "";
    $gender = $_POST['gender'] ?? "";
    $phone = $_POST['phone'] ?? "";
    $id = $_GET["id"];


    $sql = "UPDATE profile SET email='$email',gender = '$gender',phone = '$phone' WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $response = $stmt->execute();
    echo json_encode(array("status"=> true,"message"=>$response));



} else {
    echo json_encode(array(
        "status" => false,
        "message" => "Only put method is allowed"
    ));
}
