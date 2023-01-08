<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require_once $current_directory . '/../parts/header.php';
?> 

<link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/pages/not-activated.css">
    
<div class="page-wrapper">
    <div class="grid-container-fluid grid-container-fluid-custom">
        <div class="grid-x grid-x-main grid-x-vert-center">

            <div class="cell small-12 large-4 large-offset-1 cell-structure cell-main" data-aos="fade-up">
                <section>
                    <h2>Your user has not been activated!</h2>
                    <p>Dear <b><?php echo $_SESSION["username"]; ?></b>, your user has not been activated yet. Please wait for further review of your user.</p>
                </section>

                <section>
                    <a href="<?php echo $relative_directory; ?>/logout.php">Logout</a>
                </section>
            </div>

            <div class="cell small-12 large-6 cell-structure cell-main" data-aos="fade-up">
                <img src="<?php echo $relative_directory; ?>/assets/images/undraw_access_denied_re_awnf.svg" alt="">
            </div>

        </div>
    </div>
</div>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>