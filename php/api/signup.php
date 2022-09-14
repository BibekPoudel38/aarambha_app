<?php
include_once("conn.php");
$method = $_SERVER['REQUEST_METHOD'];
$salt = "akdka3b3shdga12sqweb1faduywgqdbha123sgdiuh12qwdiygasdbn";
if ($method == "POST") {
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";
    $email = $_POST['email'] ?? "";
    $gender = $_POST['gender'] ?? "";
    $phone = $_POST['phone'] ?? "";

    if ($username == "") {
        echo json_encode(
            array(
                "status" => false,
                "message" => "Username is required"
            )
        );
    } else if ($password == "") {
        echo json_encode(
            array(
                "status" => false,
                "message" => "Password is required"
            )
        );
    } else {
        $sql = "INSERT INTO profile (username,password,email,gender,phone) VALUES (:username,:password,:email,:gender,:phone)";
        $stmt = $conn->prepare($sql);
        $result =  $stmt->execute([
            ':username' => $username,
            ':password' => crypt($password,$salt),
            ':email' => $email,
            ':gender' => $gender,
            ':phone' => $phone,
        ]);
        if ($result == 0) {
            echo json_encode(
                array(
                    "status" => false,
                    "message" => "Failed to create account"
                )
            );
        } else {
            echo json_encode(
                array(
                    "status" => true,
                    "message" => "Account created"
                )
            );
        }
    }
} else {
    echo json_encode(
        array(
            "status" => false,
            "message" => $method . " is not allowed"
        )
    );
}


// $name = $_POST['name'];
// echo $name;



// hashing methods
    // md5(password)
    // crypt(password,salt)
    // sha1(password)
    // returning response with the id of the user