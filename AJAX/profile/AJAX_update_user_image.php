<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/User.php";

    $uploadedFile = $_FILES['file'];
    $uploadedFileName = $uploadedFile['name'];
    $uploadedFileTempName = $uploadedFile['tmp_name'];
    $uploadedFileType = $uploadedFile['type'];
    $uploadedFileNameUniq = uniqid() . "." . pathinfo($uploadedFileName, PATHINFO_EXTENSION);

    $uploadDirectory = dirname(__DIR__, 2) . "/assets/images/profile_pictures/";
    $uploadedFileDestination = $uploadDirectory . $uploadedFileNameUniq;

    if (move_uploaded_file($uploadedFileTempName, $uploadedFileDestination)) {
        $update_profile_image = new User([
            "user_id" => $_SESSION["user_id"],
            "profile_image" => $uploadedFileNameUniq
        ]);
        $update_profile_image_res = $update_profile_image->updateUserImage($db);

        $response = [
            "update_user_res" => $update_profile_image_res
        ];
        echo json_encode($update_profile_image_res);
    } else {
        // echo 'Error uploading file';
        exit;
    }