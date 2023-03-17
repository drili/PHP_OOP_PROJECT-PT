<?php
    function AuthControllerLogin($project_directory) {

        $current_url = $_SERVER["REQUEST_URI"];

        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === "LOGGED_IN") {
            if (strpos($current_url, "/views/") !== false) {
                // ...
            } else {
                header("Location: ". $project_directory ."/views/dashboard.php");
            }
        } else {
            if (strpos($current_url, "/views/") !== false && $_SESSION["logged_in"] !== "LOGGED_IN") {
                header("Location: ". $project_directory ."/index.php");
            }
        }
    }
    
    function AuthControllerActivated($project_directory, $user_id, $db) {
        $current_url = $_SERVER["REQUEST_URI"];

        $sql_user = "SELECT * FROM users WHERE id='".$user_id."'";
        $sql_user_res = $db->mysqli->query($sql_user);
        $user_rows = mysqli_fetch_assoc($sql_user_res);

        $user_activated = $user_rows["user_activated"];

        if (isset($_SESSION["logged_in"])) {
            if ($user_activated === "0") {
                if (strpos($current_url, "not-activated.php") !== false) {
                    // ...
                } else {
                    header("Location: ". $project_directory ."/views/not-activated.php");
                }
            } else if (strpos($current_url, "not-activated.php") !== false) {
                header("Location: ". $project_directory ."/views/dashboard.php");
            }

            $_SESSION["user_activated"] = $user_activated;
        }
    }