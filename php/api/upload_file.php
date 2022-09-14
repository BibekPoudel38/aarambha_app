<?php
// checking if file is sent by the user
if (isset($_FILES['file']) == "") {
    echo json_encode(array("sta tus" => false, "message" => "No files selected"));
} else {
    $file_name = $_FILES['file']['name']; // name of the file
    $file_tmp_name = $_FILES['file']['tmp_name']; // temporary name of the file
    $error = $_FILES['file']['error']; // error in the file if any
    $upload_name = "";
    if ($error > 0) {
        // return file error response
        echo json_encode(array("status" => false, "message" => "Error While uploading"));
    } else {
        $random_name = rand(1000, 1000000) . "-" . $file_name;
        $upload_name = $random_name;
        // replacing all the inconsistant symbols in the file name
        $upload_name = preg_replace('/\s+/', '-',  $upload_name);
        if (move_uploaded_file($file_tmp_name, 'files/' . $upload_name)) {
            echo json_encode(array("status" => true, "message" => "File Uploaded"));
        } else {
            echo json_encode(array("status" => false, "message" => "Error While uploading File"));
        }
    }
}
