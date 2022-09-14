<?php
include('conn.php');

if (isset($_GET['gender'])) {
    $gender = $_GET['gender'];
    $sql = "SELECT * FROM profile WHERE gender='$gender'";
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
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM profile WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($rows == false) {
        echo json_encode(
            [
                "status" => false,
                "message" => "User with id $id cannot be found",
            ],
            JSON_PRETTY_PRINT
        );
    } else {
        echo json_encode(
            [
                "status" => true,
                "data" => $rows,
            ],
            JSON_PRETTY_PRINT
        );
    }
} else {
    $sql = "SELECT * FROM profile";
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
