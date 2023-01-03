<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require_once $current_directory . '/../parts/header.php';
?> 
    
    <h1>Your user has not been activated!</h1>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>