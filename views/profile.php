<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require_once $current_directory . '/../parts/header.php';
?> 

<link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/pages/profile.css">

    <div class="page-wrapper">
        <div class="grid-container-fluid grid-container-fluid-custom">
            <div class="grid-x grid-x-main">

                <div class="cell small-12 large-2 cell-structure cell-sidebar">
                    <?php echo $sidebarComponent; ?>
                </div>

                <div class="cell small-12 large-10 cell-structure cell-main" data-aos="fade-up">

                    <!-- ### Heading section -->
                    <section>
                        <div class="heading-section">
                            <h3>Profile Page</h3>
                        </div>
                    </section>

                    <!-- ### Subheading section -->
                    <section>
                        <div class="sub-heading-section">
                            <div class="grid-container-fluid">
                                <div class="grid-x">
                                    <div class="cell small-12 large-9 cell-padding-right">
                                        
                                        <div class="grid-container-fluid">
                                            <div class="grid-x">

                                                <div class="cell small-12">
                                                    <div class="content box-section">
                                                        <div>
                                                            <h5>Welcome to your profile</h5>
                                                        </div>

                                                        <div class="user-profile">
                                                            <div class="image-section">
                                                                <span>
                                                                    <img src="<?php echo $relative_directory; ?>/assets/images/none.svg" alt="">
                                                                </span>
                                                                <span>
                                                                    <h6 class="mb-0"><?php echo $_SESSION["username"]; ?></h6>
                                                                    <p>KYNETIC · <?php echo $_SESSION["user_title"]; ?></p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="cell small-12">
                                                    <div class="content box-section">
                                                        <div>
                                                            <h5>Edit your profile</h5>
                                                            <p>Update your profile settings below</p>
                                                            <hr>
                                                        </div>

                                                        <div>
                                                            <!-- USERNAME
                                                            EMAIL
                                                            PASSWORD
                                                            PROFILE_IMAGE
                                                            USER_TITLE -->
                                                            <form action="" class="form-user-profile form-flex">
                                                                <div class="form-div form-div-60">
                                                                    <span>
                                                                        <label for="username">Username</label>
                                                                        <input type="text" name="username" value="<?php echo $_SESSION["username"]; ?>">
                                                                    </span>

                                                                    <span>
                                                                        <label for="email">Email</label>
                                                                        <input type="email" name="email" value="<?php echo $_SESSION["email"]; ?>">
                                                                    </span>

                                                                    <span>
                                                                        <label for="user_title">User Title</label>
                                                                        <input type="text" name="user_title" value="<?php echo $_SESSION["user_title"]; ?>">
                                                                    </span>

                                                                    <span>
                                                                        <hr>
                                                                    </span>

                                                                    <span>
                                                                        <label for="password">New Password</label>
                                                                        <input type="password" name="password" value="">
                                                                    </span>

                                                                    <span>
                                                                        <input class="mt-5" type="submit" class="btn btn-default" value="Update Profile" name="update_profile">
                                                                    </span>
                                                                </div>

                                                                <div class="form-div form-div-40">
                                                                    <span>
                                                                        <label for="profile_image">Profile Image</label>
                                                                        <div class="profile-edit-image">
                                                                            <span class="image-section">
                                                                                <img class="profile-image" src="<?php echo $relative_directory; ?>/assets/images/none.svg" alt="">
                                                                            </span>
                                                                            <span class="image-edit-label"><i class="gg-pen"></i> Edit</span>
                                                                        </div>

                                                                        <input type="file" hidden id="myFileProfile" name="profile_image" accept="image/png, image/jpeg">
                                                                    </span>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="cell small-12 large-3">
                                        <div class="profile-activity box-section">
                                            <h5>Recent Activity</h5>

                                            <span>
                                                <p><b>Current sprint activity</b></p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    
                    <h2>Welcome <?php echo (isset($_SESSION["username"]) ? $_SESSION["username"] : "Error: No username") ?> (<?php echo (isset($_SESSION["email"])) ? $_SESSION["email"] : "Error: No email" ?>)</h2>

                    <p>Your profile page.</p>
        
                    <p>User activated: <?php echo $_SESSION["user_activated"]; ?></p>
                </div>

            </div>
        </div>
    </div>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>

<script src="<?php echo $relative_directory; ?>/__js/profile/profile.js"></script>