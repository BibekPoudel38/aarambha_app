<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");
include_once("conn.php");
$method = $_SERVER['REQUEST_METHOD'];
$salt = "akdka3b3shdga12sqweb1faduywgqdbha123sgdiuh12qwdiygasdbn";

if ($method == "POST") {

    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = crypt($_POST['password'],$salt);

        $sql = "SELECT * FROM profile WHERE username='$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) > 0) {
            $sql2 = "SELECT * FROM profile WHERE username='$username'";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();
            $rows2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $db_username = $rows2['username'];
            $db_password = $rows2['password'];
            if ($db_username == $username && $db_password == $password) {
                echo json_encode(
                    array(
                        "status" => true,
                        "message" => "Login success",
                        "profile" => $rows2,
                    )
                );
            } else {
                echo json_encode(
                    array(
                        "status" => false,
                        "message" => "Password didnot match",
                    )
                );
            }
        } else {
            echo json_encode(
                array(
                    "status" => false,
                    "message" => "Id with this username doesnot exist",
                )
            );
        }
    } else {
        echo json_encode(
            array(
                "status" => false,
                "message" => "Username and Password is required"
            )
        );
    }
} else {
    echo json_encode(
        array(
            "status" => false,
            "message" => "Method not allowed"
        )
    );
}
