<?php 
    session_start();
?>

<div class="image-section">
    <span>
        <img src="../assets/images/profile_pictures/<?php echo $_SESSION["profile_image"]; ?>" alt="">
    </span>
    <span>
        <h6 class="mb-0"><?php echo $_SESSION["username"]; ?></h6>
        <p>KYNETIC · <?php echo $_SESSION["user_title"]; ?></p>
    </span>
</div>