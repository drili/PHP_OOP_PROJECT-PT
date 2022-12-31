<?php
    // *** Pre-requisites
    $rootDirectory = $_SERVER['DOCUMENT_ROOT'] . "/PROJECTS_2023\PHP_OOP_PROJECT_1";

    // * Global functions
    require $rootDirectory . "/functions/globalFunctions.php";

    // * Composer requires
    require $rootDirectory . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable($rootDirectory);
    $dotenv->load();

    // * Database connection
    require $rootDirectory . "/lib/DBConnection.php";
    $hostname = $_ENV["HOSTNAME"];
    $username = $_ENV["USERNAME"];
    $password = $_ENV["PASSWORD"];
    $database = $_ENV["DATABASE"];

    $db = new DBConnection($hostname, $username, $password, $database);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
    </head>
    <body>
        <h1>Header</h1>