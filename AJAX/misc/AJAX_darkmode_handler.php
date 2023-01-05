<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";

    $darkmode_status = mysqli_real_escape_string($db->mysqli, $_POST["darkmodeStatus"]);
    $user_email = $_SESSION["email"];
    
    $stmt = $db->mysqli->prepare("SELECT 1 FROM darkmode WHERE user_email=?");
    $stmt->bind_param("s", $_SESSION["email"]);
    $stmt->execute();
    $stmt->store_result();

    $stmt_result = $stmt->get_result();

    if ($stmt->num_rows > 0) {
        // *** User exists in darkmode table, update  row
        $update_query = "UPDATE darkmode SET darkmode_status = ? WHERE user_email = ?";

        $stmt_update = $db->mysqli->prepare($update_query);
        $stmt_update->bind_param("ss", $darkmode_status, $user_email);
        
        $stmt_update_result = $stmt_update->execute();
        if ($stmt_update_result) {
            $_SESSION["darkmode"] = $darkmode_status;
        } else {
            $_SESSION["darkmode"] = "lightmode";
        }
    } else {
        // *** User does not exists in darkmodetable, insert new row
        $insert_query = "INSERT INTO darkmode (user_email, darkmode_status) VALUES (?, ?)";

        $stmt_insert = $db->mysqli->prepare($insert_query);
        $stmt_insert->bind_param("ss", $user_email, $darkmode_status);

        if($stmt_insert->execute()) {
            $_SESSION["darkmode"] = $darkmode_status;
            session_write_close();
        } else {
            $_SESSION["darkmode"] = "lightmode";
            // printf($stmt_insert->error);
        }
    }

    $stmt->close();