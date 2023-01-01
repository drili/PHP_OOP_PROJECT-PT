<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require_once $current_directory . '/../parts/header.php';
?> 

    <h6>LOCATION: <?php echo $current_directory; ?>/dashboard.php</h6>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>