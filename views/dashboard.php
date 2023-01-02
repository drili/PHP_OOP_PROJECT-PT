<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require_once $current_directory . '/../parts/header.php';
?> 

    <h2>Welcome <?php echo (isset($_SESSION["username"]) ? $_SESSION["username"] : "Error: No username") ?> (<?php echo (isset($_SESSION["email"])) ? $_SESSION["email"] : "Error: No email" ?>)</h2>
    
    <p>User activated: <?php echo $_SESSION["user_activated"]; ?></p>
    
<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>