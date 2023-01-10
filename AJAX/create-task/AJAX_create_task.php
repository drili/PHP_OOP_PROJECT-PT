<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Tasks.php";

    $form_data = $_POST["formData"];
    parse_str($form_data, $data);

    $user_id = $_SESSION["user_id"];
    $task_name = $data["task_name"];
    $task_low = $data["task_low"];
    $task_high = $data["task_high"];
    $task_description = $_POST["taskDescription"];
    $customer_id = $data["customer"];
    $task_vertical = $data["task_vertical"];
    $task_label = $data["label"];
    $sprints_id_arr = array();
    foreach ($data["sprints"] as $sprint_id) {
        $sprints_id_arr[] = $sprint_id;
    }
    $persons_id_arr = array();
    foreach ($data["persons"] as $persons_id) {
        $persons_id_arr[] = $persons_id;
    }

    var_dump($task_name, $task_low, $task_high, $task_description, $customer_id, $sprints_id_arr, $task_vertical, $task_label, $persons_id_arr, $user_id);
