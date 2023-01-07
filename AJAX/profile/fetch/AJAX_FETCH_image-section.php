<?php 
    session_start(); 
?>

<div class="image-section">
    <span>
        <img src="../assets/images/none.svg" alt="">
    </span>
    <span>
        <h6 class="mb-0"><?php echo $_SESSION["username"]; ?></h6>
        <p>KYNETIC · <?php echo $_SESSION["user_title"]; ?></p>
    </span>
</div>