<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require_once $current_directory . '/../parts/header.php';
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
                                                                            <input required type="text" name="task_name" value="">
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12 large-2">
                                                                        <span>
                                                                            <label for="task_low">Task Low</label>
                                                                            <input required type="number" name="task_low" value="">
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12 large-2">
                                                                        <span>
                                                                            <label for="task_high">Task High</label>
                                                                            <input required type="number" name="task_high" value="">
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12">
                                                                        <span>
                                                                            <label for="task_description">Task Description</label>
                                                                            <textarea name="task_description" id="" rows="6"></textarea>
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12">
                                                                        <span>
                                                                            <label for="customers">Customer</label>
                                                                            <select required name="customers" id="customers">
                                                                                <option value="" disabled selected>Select Customer</option>
                                                                                <option value="Volvo">Volvo</option>
                                                                                <option value="Saab">Saab</option>
                                                                                <option value="Mercedes">Mercedes</option>
                                                                                <option value="Audi">Audi</option>
                                                                            </select>
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12">
                                                                        <label for="sprints">Sprint(s)</label>
                                                                        <select required class="js-example-basic-multiple" name="sprints[]" multiple="multiple">
                                                                            <option value="AL" selected>Alabama</option>
                                                                            <option value="WY">Wyoming</option>
                                                                            <option value="KY">Kentucky</option>
                                                                            <option value="NY">New York</option>
                                                                            <option value="Volvo">Volvo</option>
                                                                            <option value="Saab">Saab</option>
                                                                            <option value="Mercedes">Mercedes</option>
                                                                            <option value="Audi">Audi</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="cell small-12 large-6">
                                                                        <span>
                                                                            <label for="tabel_vertical">Task Vertical</label>
                                                                            <select required name="tabel_vertical" id="tabel_vertical">
                                                                                <option value="" disabled selected>Select Task Vertical</option>
                                                                                <option value="Volvo">Volvo</option>
                                                                                <option value="Saab">Saab</option>
                                                                                <option value="Mercedes">Mercedes</option>
                                                                                <option value="Audi">Audi</option>
                                                                            </select>
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12 large-5 large-offset-1">
                                                                        <span>
                                                                            <label for="label">Label</label>
                                                                            <select required name="label" id="label">
                                                                                <option value="" disabled selected>No Label</option>
                                                                                <option value="Volvo">Volvo</option>
                                                                                <option value="Saab">Saab</option>
                                                                                <option value="Mercedes">Mercedes</option>
                                                                                <option value="Audi">Audi</option>
                                                                            </select>
                                                                        </span>
                                                                    </div>

                                                                    <div class="cell small-12">
                                                                        <label for="persons">Select person(s)</label>
                                                                        <select required class="js-example-basic-multiple" name="persons[]" multiple="multiple">
                                                                            <option value="AL">Alabama</option>
                                                                            <option value="WY">Wyoming</option>
                                                                            <option value="KY">Kentucky</option>
                                                                            <option value="NY">New York</option>
                                                                            <option value="Volvo">Volvo</option>
                                                                            <option value="Saab">Saab</option>
                                                                            <option value="Mercedes">Mercedes</option>
                                                                            <option value="Audi">Audi</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="cell small-12">
                                                                        <span>
                                                                            <input type="submit" class="btn-inline btn-main mt-5 mr-10" value="Create Task" name="create_task">
                                                                            <input type="submit" class="btn-inline btn-white mt-5" value="Create Task - Keep settings" name="create_task_keep_settings">
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
                                            <p><b>Lorem ipsum dol.</b></p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, similique.</p>
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