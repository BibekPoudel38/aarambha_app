<?php
include('conn.php');
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT i.*, d.name as d_name, d.icon as d_icon,d.color as department_color FROM interns i JOIN department d on i.department = d.id WHERE i.id = $id";
    // $sql = "SELECT * from interns";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($rows == false) {
        // if the user doesnot exist

        echo json_encode(
            [
                "status" => false,
                "message" => "Data doesn't exist",
            ],
            JSON_PRETTY_PRINT
        );
    } else {
        // if the user exist
        echo json_encode(
            [
                "status" => true,
                "data" => $rows,
            ],
            JSON_PRETTY_PRINT
        );
    }
} else {
    $sql = "SELECT i.*, d.name as d_name, d.icon as d_icon,d.color as department_color FROM interns i JOIN department d on i.department = d.id";
    // $sql = "SELECT * from interns ";
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
}
