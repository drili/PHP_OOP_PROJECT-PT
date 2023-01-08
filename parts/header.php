<?php
    // *** INIT session
    session_start();
    
    // *** Current directory
    $current_directory_header = dirname(__FILE__);

    // *** Include header_pre.php
    require $current_directory_header . './header_pre.php';

    // *** AuthController
    require $relative_directory . "/lib/AuthController.php";
    AuthControllerLogin($project_directory);
    AuthControllerActivated($project_directory);

    // *** Page structure components
    require $relative_directory . "/components/Topbar.php";
    require $relative_directory . "/components/Sidebar.php";
    $topbarComponent = topbarComponent($relative_directory);
    $sidebarComponent = sidebarComponent($relative_directory);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="<?php echo $relative_directory; ?>/assets/images/components.svg">
        <title>Index</title>

        <!-- *** JS Pre -->
        <script src="<?php echo $relative_directory; ?>/__js/global_pre.js"></script>

        <!-- *** External scripts -->
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

        <!-- *** CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/global.css">

        <!-- *** Zurb Foundation -->
        <!-- Compressed CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/css/foundation.min.css" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/js/foundation.min.js" crossorigin="anonymous"></script>

        <!-- *** AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- *** CSS.GG -->
        <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>

        <!-- *** jQuery Toast CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
        <body class="<?php if(isset($_SESSION["darkmode"])) : echo ($_SESSION["darkmode"] === "darkmode") ? "darkmode" : ""; endif;?>">


        <?php if(isset($_SESSION["logged_in"]) && $_SESSION["user_activated"] == 1) : ?>
            <?php echo $topbarComponent; ?>
        <?php endif; ?>