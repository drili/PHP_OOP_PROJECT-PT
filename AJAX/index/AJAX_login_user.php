<?php
    // *** INIT session
    session_start();
    
    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/User.php";

    $email = mysqli_real_escape_string($db->mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($db->mysqli, $_POST['password']);

    $user_login = new User([
        "email" => $email,
        "password" => $password
    ]);

    $user_login_result = $user_login->loginUser($db);

    if ($user_login_result == "LOGGED_IN") {
        $response_status = "LOGGED_IN";
    } else if ($user_login_result == "INVALID_CREDENTIALS") {
        $response_status = "INVALID_CREDENTIALS";
    } else {
        $response_status = "UNKNOWN_LOGIN_ERROR";
    }

    $response = [
        "response_status" => $response_status
    ];

    echo json_encode($response);

    exit;