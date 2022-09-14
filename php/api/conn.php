<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aarambha";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo json_encode([
    //     "status" => true,
    //     "message" => "Connected to database",
    // ]);
} catch (PDOException $e) {
    // echo ($e->getMessage());
    echo json_encode([
        "status" => false,
        "message" => "Failed to connect",
        "error" => $e->getMessage(),
    ]);
}
