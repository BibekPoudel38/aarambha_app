<?php
include('conn.php');
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");    
$sql = "SELECT * FROM department";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(
    [
        "status" => true,
        "data" => $rows,
    ],
    JSON_PRETTY_PRINT
);
