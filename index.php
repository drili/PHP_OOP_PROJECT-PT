<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = ".";

    // *** Include header.php & files
    require $current_directory . '/parts/header.php';
    require $current_directory . "/classes/User.php";

    // *** Components
    require $current_directory . "/components/Form.php";

    if (isset($_SESSION["logged_in"])) {
        echo $_SESSION["logged_in"];
    }
?> 

<h6>LOCATION: <?php echo $current_directory; ?> index.php</h6>

<section class="section-form-element">
    <?php
        $form_elements = [
            [
                'label' => 'Email',
                'type' => 'email',
                'name' => 'email',
                'value' => ''
            ],
            [
                'label' => 'Password',
                'type' => 'password',
                'name' => 'password',
                'value' => ''
            ]
        ];

        $form = createForm("login-form", "", "", $form_elements, "Login");

        echo $form;
    ?>

    <div class="status-msg form-status-message__login-form">

    </div>

    <div class="link-redirect">
        <p>Don't have an account? <a href="./register.php">Register here</a></p>
    </div>
</section>

<?php
    // *** Include footer.php
    require_once $current_directory . '/parts/footer.php';
?>

<script src="__js/index/login-user.js"></script>