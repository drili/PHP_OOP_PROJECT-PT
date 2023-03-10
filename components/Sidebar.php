<link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/css_components/sidebar.css">

<?php
    function sidebarComponent($relative_directory) {
        ob_start();
    ?>
        <setion class="sidebar-section">
            <div class="grid-container-fluid">
                <div class="grid-x">

                    <div class="cell small-12 sidebar-section-top">
                        <img src="<?php echo $relative_directory; ?>/assets/images/components.svg" alt="">
                        <h6><b>Planning Tool</b></h6>
                    </div>

                    <div class="cell small-12 sidebar-section-menu">
                        <ul>
                            <li data-link-value="dashboard">
                                <a href="<?php echo $relative_directory; ?>/views/dashboard.php"><i class="gg-touchpad"></i> Dashboard</a>
                            </li>

                            <li data-link-value="workflow">
                                <a href="<?php echo $relative_directory; ?>/views/workflow.php"><i class="gg-attribution"></i> Workflow</a>
                            </li>

                            <li data-link-value="time-registrations">
                                <a href="<?php echo $relative_directory; ?>/views/time-registrations.php"><i class="gg-alarm"></i> Time registrations</a>
                            </li>

                            <li data-link-value="customers">
                                <a href="<?php echo $relative_directory; ?>/views/customers.php"><i class="gg-user-list"></i> Customers</a>
                            </li>

                            <li data-link-value="notes">
                                <a href="<?php echo $relative_directory; ?>/views/notes.php"><i class="gg-notes"></i> Notes</a>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-section-bottom">
                        <div class="darkmode-section">
                            <div>
                                <input type="checkbox" class="checkbox" id="checkbox" <?php echo ($_SESSION["darkmode"] === "darkmode") ? "" : "checked"; ?>>
                                <label for="checkbox" class="label">
                                    <i class="gg-moon"></i>
                                    <i class="gg-sun"></i>
                                    <div class='ball'></div>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </setion>
    <?php
        $sidebar = ob_get_contents();
        ob_end_clean();

        return $sidebar;
    }
    