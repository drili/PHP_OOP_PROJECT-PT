<?php
    // *** INIT session
    session_start();
    
    // *** Current directory
    $current_directory_header = dirname(__FILE__);

    // *** Include header_pre.php
    require $current_directory_header . './header_pre.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>

        <!-- *** External scripts -->
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

        <!-- *** CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/global.css">

        <!-- *** Zurb Foundation -->
        <!-- Compressed CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/css/foundation.min.css" crossorigin="anonymous">
        <!-- Compressed JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/js/foundation.min.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <section class="nav-section">
            <nav class="nav-main">
                <?php if(isset($_SESSION["logged_in"])) : ?>
                    <a href="<?php echo isset($relative_directory) ? $relative_directory : "." ?>/logout.php">Logout</a>
                <?php else : ?>
                    <a href="<?php echo isset($relative_directory) ? $relative_directory : "." ?>/index.php">Login</a>
                <?php endif; ?>
            </nav>
            <hr>
        </section>