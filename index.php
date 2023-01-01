<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & files
    require $current_directory . '/parts/header.php';
    require $current_directory . "/classes/User.php";

    // *** Components
    require $current_directory . "/components/Form.php";
?> 

<h1>LOCATION: <?php echo $current_directory; ?> index.php</h1>

<section>
    <?php
        $form_elements = [
            [
                'label' => 'Username',
                'type' => 'text',
                'name' => 'username',
                'value' => ''
            ],
            [
                'label' => 'Password',
                'type' => 'password',
                'name' => 'password',
                'value' => ''
            ],
            [
                'label' => 'Email',
                'type' => 'email',
                'name' => 'email',
                'value' => ''
            ]
        ];

        $form = createForm("register-form", "", "", $form_elements);

        echo $form;
    ?>
</section>

<?php
    // *** Include footer.php
    require_once $current_directory . '/parts/footer.php';
?>

<script src="__js/index/register-user.js"></script>

