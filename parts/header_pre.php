<?php
    // *** Pre-requisites
    $root_directory = $_SERVER['DOCUMENT_ROOT'] . "/PROJECTS_2023\PHP_OOP_PROJECT_1";

    // * Global functions
    require $root_directory . "/functions/globalFunctions.php";

    // * Composer requires
    require $root_directory . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable($root_directory);
    $dotenv->load();

    // *** Init Database connection
    require $root_directory . "/lib/DBConnection.php";
    $hostname = $_ENV["HOSTNAME"];
    $username = $_ENV["USERNAME"];
    $password = $_ENV["PASSWORD"];
    $database = $_ENV["DATABASE"];

    $db = new DBConnection($hostname, $username, $password, $database);
?>