<link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/css_components/topbar.css">

<?php
    function topbarComponent($relative_directory) {
        ob_start();
    ?>
        <section class='nav-section'>
            <div class="grid-container-fluid">
                <div class="grid-x">

                    <div class="cell small-12 large-10 large-offset-2">
                        <nav class="nav-main">
                            <div class="nav-searchbar-outter">
                                <div class="nav-searchbar">
                                    <i class="gg-search"></i>
                                    <input class="mb-0" type="search" placeholder="Search for stuff...">
                                </div>
                                <button class="btn btn-white">Search</button>
                            </div>

                            <ul class="nav-ul">
                                <li>
                                    <span class="nav-button">
                                        <a class="btn btn-main" href="<?php echo $relative_directory; ?>/views/create-task.php"><i class="gg-add-r"></i>Create Task</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="nav-icon">
                                        <i class="gg-comment"></i>
                                    </span>
                                </li>
                                <li>
                                    <span class="nav-icon">
                                        <i class="gg-bell"></i>
                                    </span>
                                </li>
                                <li>
                                    <span class="profile-image">
                                        <img class="nav-profile-img" src="<?php echo $relative_directory; ?>/assets/images/none.svg" alt="">
                                        <i class="gg-chevron-down-o"></i>
                                    </span>
                                    <span class="profile-links">
                                        <a href='<?php echo (isset($relative_directory) ? $relative_directory : '.'); ?>/views/profile.php'>Profile <i class="gg-user"></i></a>
                                        <a href='<?php echo (isset($relative_directory) ? $relative_directory : '.'); ?>/logout.php'>Logout <i class="gg-log-out"></i></a>
                                    </span>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </section>
    <?php 
        $topbar = ob_get_contents();
        ob_end_clean();

        return $topbar;
    }