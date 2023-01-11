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
    $task_label = $data["label"];
    $task_vertical_id = $data["task_vertical"];
    $sprints_id_arr = array();
    foreach ($data["sprints"] as $sprint_id) {
        $sprints_id_arr[] = $sprint_id;
    }
    $persons_id_arr = array();
    foreach ($data["persons"] as $persons_id) {
        $persons_id_arr[] = $persons_id;
    }

    if ($task_low > $task_high) {
        $response = [
            "query_status" => "ERR_CREATING_TASK_TIME"
        ];
        echo json_encode($response);
    } else {
        $tasks = new Tasks();
        $tasks->task_name = $task_name;
        $tasks->task_low = $task_low;
        $tasks->task_high = $task_high;
        $tasks->task_description = $task_description;
        $tasks->sprint_id = $sprints_id_arr;
        $tasks->customer_id = $customer_id;
        $tasks->label_id = $task_label;
        $tasks->user_id = $user_id;
        $tasks->task_persons = $persons_id_arr;
        $tasks->task_vertical_id = $task_vertical_id;
    
        $response = $tasks->createTask();
    
        $response = [
            "query_status" => $response
        ];
    
        echo json_encode($response);   
    }


    exit;
