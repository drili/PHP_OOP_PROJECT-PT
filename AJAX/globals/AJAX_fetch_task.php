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
    <div class="page-wrapper-modal">
        <section>
            <div class="task-modal">

                <div class="grid-container-fluid">
                    <div class="grid-x">
                        <div class="cell small-12 large-8 cell-padding-right">
                            <form action="" class="form-task-edit form-flex">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, quia. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque labore ducimus sed, magni aliquam odio.</p>
                            </form>
                        </div>

                        <div class="cell small-12 large-4">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quidem similique sapiente eveniet suscipit repellat, laudantium eum sunt maiores deserunt hic vitae, ducimus dolore quod aliquam, quia ea explicabo velit?</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <div>
        <h2>ALL:</h2>
        <pre>
            <?php var_dump($response["query_status"][0]); ?>
        </pre>
    </div>

<?php else : ?>

    <?php var_dump($response); ?>

<?php endif; ?>