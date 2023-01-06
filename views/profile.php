<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require_once $current_directory . '/../parts/header.php';
?> 

    <div class="page-wrapper">
        <div class="grid-container-fluid grid-container-fluid-custom">
            <div class="grid-x grid-x-main">

                <div class="cell small-12 large-2 cell-structure cell-sidebar">
                    <?php echo $sidebarComponent; ?>
                </div>

                <div class="cell small-12 large-10 cell-structure cell-main" data-aos="fade-up">
                    <h2>Welcome <?php echo (isset($_SESSION["username"]) ? $_SESSION["username"] : "Error: No username") ?> (<?php echo (isset($_SESSION["email"])) ? $_SESSION["email"] : "Error: No email" ?>)</h2>

                    <p>Your profile page.</p>
        
                    <p>User activated: <?php echo $_SESSION["user_activated"]; ?></p>
                </div>

            </div>
        </div>
    </div>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>