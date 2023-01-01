<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/User.php";

    $username = mysqli_real_escape_string($db->mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($db->mysqli, $_POST['password']);
    $email = mysqli_real_escape_string($db->mysqli, $_POST['email']);

    $new_user = new User([
        "username" => $username,
        "password" => $password,
        "email" => $email
    ]);

    $user_result = $new_user->createUser($db);

    if ($user_result == "USER_EMAIL_EXISTS") {
        $response_status = "USER_EMAIL_EXISTS";
    }
    
    if ($user_result == "USER_CREATED_TRUE") {
        $response_status = "USER_CREATED_TRUE";
    }
    
    if($user_result == "USER_CREATED_FALSE") {
        $response_status = "USER_CREATED_FALSE";
    }

    $response = [
        "response_status" => $response_status
    ];

    echo json_encode($response);

    exit;