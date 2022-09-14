<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data = file_get_contents("php://input");

$keys = array_keys(json_decode($data, true));
$values = array_values(json_decode($data, true));
if (in_array("password", $keys)) {
    echo json_encode(array(
        "status"=> false,
        "message"=>"password cannot be changed",
    ));

} else {
    $id = $_GET['id'];
    $placeholders = array();
    for ($i = 0; $i < count($values); $i += 1) {
        array_push($placeholders, $keys[$i] . "='" . $values[$i] . "'");
    }
    $plc = implode(",", $placeholders);
    include("conn.php");
    $sql = "UPDATE profile SET $plc WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
