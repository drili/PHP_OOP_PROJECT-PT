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
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni eos fugiat numquam ex harum a repellat, rerum non aliquid consequatur mollitia perspiciatis id corrupti suscipit sunt dicta quae voluptatibus est obcaecati iure ea libero? Deleniti doloribus quas aliquam exercitationem est eum harum eaque, a eveniet neque impedit nemo eligendi nobis?</p>

        <h2>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A, reprehenderit!</h2>

        <?php var_dump($response); ?>
    </div>

<?php else : ?>

    <?php var_dump($response); ?>

<?php endif; ?>