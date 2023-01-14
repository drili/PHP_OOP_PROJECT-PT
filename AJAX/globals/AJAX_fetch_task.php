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
        <p>task_id: <?php echo $response["query_status"][0]["task_id"]; ?></p>
        <p>task_name: <?php echo $response["query_status"][0]["task_name"]; ?></p>
        <p>task_low: <?php echo $response["query_status"][0]["task_low"]; ?></p>
        <p>task_high: <?php echo $response["query_status"][0]["task_high"]; ?></p>
        <p>task_workflow_status: <?php echo $response["query_status"][0]["task_workflow_status"]; ?></p>
        <p>task_description: <?php echo $response["query_status"][0]["task_description"]; ?></p>
        <p>sprint_id: <?php echo $response["query_status"][0]["sprint_id"]; ?></p>
        <p>customer_id: <?php echo $response["query_status"][0]["customer_id"]; ?></p>
        <p>label_id: <?php echo $response["query_status"][0]["label_id"]; ?></p>
        <p>task_type_id: <?php echo $response["query_status"][0]["task_type_id"]; ?></p>
        <p>task_vertical_id: <?php echo $response["query_status"][0]["task_vertical_id"]; ?></p>
        <p>is_external: <?php echo $response["query_status"][0]["is_external"]; ?></p>
        <p>created_at: <?php echo $response["query_status"][0]["created_at"]; ?></p>
        <p>created_by: <?php echo $response["query_status"][0]["created_by"]; ?></p>
    </div>

<?php else : ?>

    <?php var_dump($response); ?>

<?php endif; ?>