<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Tasks.php";

    $data_task_id = $_POST["dataTaskId"];

    $tasks = new Tasks();
    $tasks->task_id = $data_task_id;

    $response = $tasks->fetchTask();

    $response = [
        "query_status" => $response
    ]
?>

<?php if ($response["query_status"] !== "ERR_FETCHING_TASKS_BY_USER") : ?>
    <div>
        <h2>ALL:</h2>
        <pre>
            <?php var_dump($response["query_status"][0]); ?>
        </pre>
    </div>

<?php else : ?>

    <?php var_dump($response); ?>

<?php endif; ?>