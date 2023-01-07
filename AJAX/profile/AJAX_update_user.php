<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/User.php";

    $username = mysqli_real_escape_string($db->mysqli, $_POST['username']);
    $email = mysqli_real_escape_string($db->mysqli, $_POST["email"]);
    $user_title = mysqli_real_escape_string($db->mysqli, $_POST["user_title"]);
    $new_password = mysqli_real_escape_string($db->mysqli, $_POST["password"]);

    $update_user = new User([
        "username" => $username, 
        "email" => $email,
        "user_title" => $user_title, 
        "new_password" => $new_password,
        "user_id" => $_SESSION["user_id"]
    ]);
    $update_user_res = $update_user->updateUser($db);

    $response = [
        "update_user_res" => $update_user_res
    ];

    echo json_encode($response);

    exit;