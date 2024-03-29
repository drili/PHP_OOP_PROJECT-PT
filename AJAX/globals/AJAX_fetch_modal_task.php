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
    <?php
        $response_query = $response["query_status"][0];
    ?>
    <div class="page-wrapper page-wrapper-modal">
        <section>
            <div class="task-modal">

                <div class="grid-container-fluid">
                    <div class="grid-x">

                        <div class="cell small-12">
                            <section class="form-top mb-20 section-task-modal-top">
                                <span>
                                    <p class="small-p">Customer:</p>
                                    <label for="" class="label-custom mr-10" style="border: 1px solid <?php echo $response_query["customer_color"]; ?>; color: <?php echo $response_query["customer_color"]; ?> !important">
                                        <?php echo $response_query["customer_name"]; ?>
                                    </label>
                                </span> 

                                <span>
                                    <p class="small-p">Vertical:</p>
                                    <label for="" class="label-custom mr-10" style="">
                                        <?php echo $response_query["task_vertical_name"]; ?>
                                    </label>
                                </span>

                                <span>
                                    <p class="small-p">Label:</p>
                                    <label for="" class="label-custom mr-10" style="border: 1px solid <?php echo $response_query["label_color"]; ?>; color: <?php echo $response_query["label_color"]; ?> !important;">
                                        <?php echo $response_query["label_name"]; ?>
                                    </label>
                                </span>
                            </section>
                        </div>

                        <div class="cell small-12 large-8 cell-padding-right">

                            <div class="content box-section">
                                <div>
                                    <form action="" class="form-create-task">
                                        <div class="grid-container-fluid">
                                            <div class="grid-x grid-x-space-between">

                                                <div class="cell small-12 large-7">
                                                    <span>
                                                        <label for="task_name">Task Name</label>
                                                        <input class="validate-required" required type="text" name="task_name" value="<?php echo $response_query["task_name"]; ?>">
                                                    </span>
                                                </div>

                                                <div class="cell small-12 large-2">
                                                    <span>
                                                        <label for="task_low">Task Low</label>
                                                        <input class="validate-required" required type="number" name="task_low" value="<?php echo $response_query["task_low"]; ?>">
                                                    </span>
                                                </div>

                                                <div class="cell small-12 large-2">
                                                    <span>
                                                        <label for="task_high">Task High</label>
                                                        <input class="validate-required" required type="number" name="task_high" value="<?php echo $response_query["task_high"]; ?>">
                                                    </span>
                                                </div>

                                                <div class="cell small-12 cell-description">
                                                    <span>
                                                        <div>
                                                            <label for="task_description">Task Description</label>
                                                            <div id="QuillEditorModal" class="task_description">
                                                                <?php echo $response_query["task_description"]; ?>
                                                            </div>
                                                        </div>
                                                        <!-- <textarea name="task_description" id="" rows="6"></textarea> -->
                                                    </span>
                                                </div>

                                                <div class="cell small-12 custom-justify-between">
                                                    <span>
                                                        <input type="submit" class="btn-inline btn-main mt-5 mr-10 btn-update-task" value="Update task" name="update_task">
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="cell small-12 large-4">
                            <div class="content-functionality box-section">
                                
                                <div class="functionality-headline">
                                    <h5>Functionalities</h5>
                                    <p>Change additional task settings</p>
                                    <hr>
                                </div>

                            </div>
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

    <script>
        // *** Init Quill
        var quill = new Quill('#QuillEditorModal', {
            theme: 'snow'
        });
    </script>

<?php else : ?>

    <?php var_dump($response); ?>

<?php endif; ?>