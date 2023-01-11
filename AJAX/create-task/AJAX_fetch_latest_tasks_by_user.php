<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Tasks.php";

    $current_user = $_SESSION["user_id"];

    $tasks = new Tasks();
    $tasks->user_id = $current_user;

    $response = $tasks->fetchLatestTasksByUser();

    $response = [
        "query_status" => $response
    ];
?>

<?php if ($response["query_status"] !== "ERR_FETCHING_TASKS_BY_USER") : ?>
    <?php foreach($response["query_status"] as $value) : ?>
       <div class="task-fetched-single task-fetched-<?php echo $value["task_id"]; ?>">
            <p><b><?php echo $value["task_name"]; ?></b></p>

            <div class="task-date">
                <i class="gg-alarm"></i>
                <p class="small-p"><?php echo $value["created_at"]; ?></p>
            </div>
            
       </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="fetch-error">
        <p>There was an error fetching data.</p>
    </div>
<?php endif; ?>