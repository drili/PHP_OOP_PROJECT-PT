<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require_once $current_directory . '/../parts/header.php';
    require_once $current_directory . "/../classes/Sprints.php";
    require_once $current_directory . "/../classes/User.php";

    $sprints = new Sprints();
    $valid_sprints = $sprints->getValidSprints();
    $task_verticals = $sprints->getSprintVerticals();
    $task_labels = $sprints->getSprintLabels();

    $users = new User([]);
    $active_users = $users->getAllActiveUser($db);
?> 

<link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/pages/create-task.css">

<div class="page-wrapper">
    <div class="grid-container-fluid grid-container-fluid-custom">
        <div class="grid-x grid-x-main">

            <div class="cell small-12 large-2 cell-structure cell-sidebar">
                <?php echo $sidebarComponent; ?>
            </div>

            <div class="cell small-12 large-10 cell-structure cell-main" data-aos="fade-up">

                <!-- ### Heading section -->
                <section>
                    <div class="heading-section">
                        <h3>Create Task</h3>
                    </div>
                </section>

                <section>
                    <div class="sub-heading-section">
                        <div class="grid-container-fluid">
                            <div class="grid-x">
                                <div class="cell small-12 large-8 cell-padding-right">
                                    
                                    <div class="grid-container-fluid">
                                        <div class="grid-x">

                                            <div class="cell small-12">
                                                <div class="content box-section">
                                                    <div>
                                                        <h5>Fill out the form to create a new task</h5>
                                                    </div>

                                                    <div>
                                                        <form action="" class="form-create-task">
                                                            <div class="grid-container-fluid">
                                                                <div class="grid-x grid-x-space-between">

                                                                    <div class="cell small-12 large-7">
                                                                        <span>
                                                                            <label for="task_name">Task Name</label>
                                                                            <input class="validate-required" required type="text" name="task_name" value="">
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12 large-2">
                                                                        <span>
                                                                            <label for="task_low">Task Low</label>
                                                                            <input class="validate-required" required type="number" name="task_low" value="">
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12 large-2">
                                                                        <span>
                                                                            <label for="task_high">Task High</label>
                                                                            <input class="validate-required" required type="number" name="task_high" value="">
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12 cell-description">
                                                                        <span>
                                                                            <div>
                                                                                <label for="task_description">Task Description</label>
                                                                                <div id="QuillEditor" class="task_description"></div>
                                                                            </div>
                                                                            <!-- <textarea name="task_description" id="" rows="6"></textarea> -->
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12">
                                                                        <span>
                                                                            <label for="customer">Customer</label>
                                                                            <select required name="customer" id="customer" class="validate-required">
                                                                                <?php
                                                                                    $sql_fetch_customers = "SELECT * FROM customers
                                                                                    WHERE customer_enabled='1'";
                                                                                    $sql_fetch_customers_res = $db->mysqli->query($sql_fetch_customers);
                                                                                ?>
                                                                                    <option value="" disabled selected>Select Customer</option>
                                                                                <?php while($row = $sql_fetch_customers_res->fetch_assoc()) : ?>
                                                                                    <option value="<?php echo $row["customer_id"]; ?>"><?php echo $row["customer_name"]; ?></option>
                                                                                <?php endwhile; ?>
                                                                            </select>
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12">
                                                                        <label for="sprints">Sprint(s)</label>
                                                                        <select required class="js-example-basic-multiple validate-required validate-required-select2" name="sprints[]" multiple="multiple">
                                                                            <?php $sprint_iterator = 0; ?>
                                                                            <?php foreach($valid_sprints as $sprint) : ?>
                                                                                <option value="<?php echo $sprint["sprint_id"]; ?>" <?php echo ($sprint_iterator == 0) ? "selected" : ""; ?>>
                                                                                <?php echo $sprint["sprint_name"]; ?>
                                                                                </option>

                                                                                <?php $sprint_iterator++; ?>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="cell small-12 large-6">
                                                                        <span>
                                                                            <label for="task_vertical">Task Vertical</label>
                                                                            <select required name="task_vertical" id="task_vertical" class="validate-required">
                                                                                <option value="" disabled selected>Select Task Vertical</option>
                                                                                <?php foreach($task_verticals as $tv) : ?>
                                                                                    <option value="<?php echo $tv["task_vertical_id"]; ?>">
                                                                                        <?php echo $tv["task_vertical_name"]; ?>
                                                                                    </option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12 large-5 large-offset-1">
                                                                        <span>
                                                                            <label for="label">Label</label>
                                                                            <select required name="label" id="label">
                                                                                <?php foreach($task_labels as $tl) : ?>
                                                                                    <option value="<?php echo $tl["label_id"]; ?>" style="background:<?php echo $tl["label_color"]; ?>">
                                                                                        <?php echo $tl["label_name"]; ?>
                                                                                    </option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12">
                                                                        <label for="persons">Select person(s)</label>
                                                                        <select required class="js-example-basic-multiple validate-required validate-required-select2" name="persons[]" multiple="multiple">
                                                                            <?php foreach($active_users as $users) : ?>
                                                                                <option value="<?php echo $users["id"]; ?>">
                                                                                    <?php echo $users["username"]; ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="cell small-12">
                                                                        <span>
                                                                            <input type="submit" class="btn-inline btn-main mt-5 mr-10 btn-create-task-default" value="Create Task" name="create_task">
                                                                            <input type="submit" class="btn-inline btn-white mt-5 btn-create-task-w-settings" value="Create Task - Keep settings" name="create_task_keep_settings">
                                                                        </span>

                                                                        <span>
                                                                            
                                                                        </span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="cell small-12 large-4">
                                    <div class="profile-activity box-section">
                                        <h5>Recent Created Tasks</h5>

                                        <span>
                                            <p><b>Tasks created by you</b></p>
                                            <hr>
                                            <div class="fetched-tasks-by-user">
                                                <div class="loader-outter mt-40">
                                                    <div class='custom-loader'><i class='gg-spinner'></i></div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>

<script src="<?php echo $relative_directory; ?>/__js/create-task/create-task.js"></script>