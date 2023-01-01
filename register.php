<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = ".";

    // *** Include header.php & files
    require $current_directory . '/parts/header.php';
    require $current_directory . "/classes/User.php";

    // *** Components
    require $current_directory . "/components/Form.php";
?> 

<h6>LOCATION: <?php echo $current_directory; ?> register.php</h6>

<section class="section-form-element">
    <?php
        $form_elements = [
            [
                'label' => 'Username',
                'type' => 'text',
                'name' => 'username',
                'value' => ''
            ],
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

        $form = createForm("register-form", "", "", $form_elements, "Register");

        echo $form;
    ?>

    <div class="status-msg form-status-message__register-form">

    </div>

    <div class="link-redirect">
        <p>Already an account? <a href="./index.php">Login here</a></p>
    </div>
</section>

<?php
    // *** Include footer.php
    require_once $current_directory . '/parts/footer.php';
?>

<script src="__js/register/register-user.js"></script>

