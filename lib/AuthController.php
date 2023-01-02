<?php
    function AuthControllerLogin($project_directory) {

        $current_url = $_SERVER["REQUEST_URI"];

        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === "LOGGED_IN") {
            echo "0";
            if (strpos($current_url, "/views/") !== false) {
                // ...
            } else {
                header("Location: ". $project_directory ."/views/dashboard.php");
            }
        } else {
            if (strpos($current_url, "/views/") !== false && $_SESSION["logged_in"] !== "LOGGED_IN") {
                echo "3";
                header("Location: ". $project_directory ."/index.php");
            }
        }
    }
    
    function AuthControllerActivated($project_directory) {
        $current_url = $_SERVER["REQUEST_URI"];

        if (isset($_SESSION["logged_in"])) {
            if ($_SESSION["user_activated"] === "0") {
                if (strpos($current_url, "not-activated.php") !== false) {
                    // ...
                } else {
                    header("Location: ". $project_directory ."/views/not-activated.php");
                }
            } else if (strpos($current_url, "not-activated.php") !== false) {
                header("Location: ". $project_directory ."/views/dashboard.php");
            }
        }
    }