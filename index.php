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

<link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/pages/index.css">

<div class="container-outter">
    <div class="container-custom">

        <div class="grid-container">
            <div class="grid-x">

                <div class="cell cell-main small-12 large-6">
                    <div class="cell-inner">
                        <section class="mb-40" data-aos="fade-right">
                            <h3 class="bold-text">Welcome back</h3>
                            <p class="light-text">Please enter your credentials to login!</p>
                        </section>

                        <section class="section-form-element" data-aos="fade-right" data-aos-delay="300">
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
                    </div>
                </div>

                <div class="cell cell-main large-offset-1 large-5 cell-not-mobile">
                    <section data-aos="fade-left">
                        <div class="cell-inner">
                            <div class="login-intro-image">
                                <img src="<?php echo $relative_directory; ?>/assets/images/undraw_fingerprint_login_re_t71l.svg" alt="">
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    
    </div>
</div>

<?php
    // *** Include footer.php
    require_once $current_directory . '/parts/footer.php';
?>

<script src="__js/index/login-user.js"></script>