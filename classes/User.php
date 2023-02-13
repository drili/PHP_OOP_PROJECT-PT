<?php
    class User {

        public $username;
        public $password;
        public $email;
        public $new_password;
        public $user_title;
        public $user_id;
        public $profile_image;

        public function __construct($data) {
            if (isset($data["username"])) { $this->username = $data["username"]; }
            if (isset($data["password"])) { $this->password = $data["password"]; }
            if (isset($data["email"])) { $this->email = $data["email"]; }
            if (isset($data["new_password"])) { $this->new_password = $data["new_password"]; }
            if (isset($data["user_title"])) { $this->user_title = $data["user_title"]; }
            if (isset($data["user_id"])) { $this->user_id = $data["user_id"]; }
            if (isset($data["profile_image"])) { $this->profile_image = $data["profile_image"]; }
        }

        public function createUser($db) {
            // *** Check if email already exists
            $query_check_email = "SELECT * FROM users WHERE email = ?";
            $stmt_check_email = $db->mysqli->prepare($query_check_email);
            $stmt_check_email->bind_param("s", $this->email);
            $stmt_check_email->execute();
            $stmt_check_email_results = $stmt_check_email->get_result();

            if (empty($this->username) || empty($this->password)) {
                return "USER_CREATED_FALSE";
            }

            if ($stmt_check_email_results->num_rows > 0) {
                // echo "<script>";
                //     echo "console.log( '!!! ERROR: User.php: Email already exists!' );";
                // echo "</script>";
                return "USER_EMAIL_EXISTS";
            }

            // *** Hash password
            $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);

            $query_create_user = "INSERT INTO users (username, password, email, created_at) VALUES (?, ?, ?, ?)";
            $created_at = date('d-m-Y');
            
            $stmt = $db->mysqli->prepare($query_create_user);
            $stmt->bind_param("ssss", $this->username, $hashed_password, $this->email, $created_at);

            if ($stmt->execute()) {
                // echo "User created successfully!";
                return "USER_CREATED_TRUE";
            } else {
                return "USER_CREATED_FALSE";
                // echo "There was an error creating user!";
            }
        }

        public function updateUser($db) {
            $username = mysqli_real_escape_string($db->mysqli, $this->username);
            $email = mysqli_real_escape_string($db->mysqli, $this->email);
            $user_title = mysqli_real_escape_string($db->mysqli, $this->user_title);
            $new_password = mysqli_real_escape_string($db->mysqli, $this->new_password);
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $user_id = mysqli_real_escape_string($db->mysqli, $this->user_id);

            // *** Check if email belongs to user or not
            $query_user_check = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
            $query_user_result = $db->mysqli->query($query_user_check);
            $row = $query_user_result->fetch_assoc();
            
            if ($row["email"] !== $email) {
                // *** Check if email already exists
                $query_user = "SELECT * FROM users WHERE email='$email' LIMIT 1";
                $query_user_result = $db->mysqli->query($query_user);

                if ($query_user_result->num_rows == 1) {
                    return "ERROR_EMAIL_EXISTS";
                }
            } else {
                $query_update_user = "UPDATE users SET
                username='".$username."',
                email='".$email."',
                user_title='".$user_title."',
                password='".$hashed_new_password."'
                WHERE id='".$user_id."'";
                $query_update_user_res = $db->mysqli->query($query_update_user);

                if ($query_update_user_res) {
                    if ($db->mysqli->affected_rows > 0) {
                        // *** Update session values
                        $_SESSION["username"] = $username;
                        $_SESSION["email"] = $email;
                        $_SESSION["user_title"] = $user_title;
                        
                        return "USER_UPDATE_SUCCESS";
                    } else {
                        return "USER_UPDATE_ERROR";
                    }
                } else {
                    return "QUERY_ERROR";
                }
            }
        }

        public function updateUserImage($db) {
            $profile_image = mysqli_real_escape_string($db->mysqli, $this->profile_image);
            $user_id = mysqli_real_escape_string($db->mysqli, $this->user_id);

            if (isset($profile_image)) {
                $sql_insert_image = "UPDATE users SET profile_image='".$profile_image."' WHERE id='".$user_id."'";
                $sql_insert_image_res = $db->mysqli->query($sql_insert_image);

                if (mysqli_affected_rows($db->mysqli) > 0) {
                    $_SESSION["profile_image"] = $profile_image;
                    return "Query was successful";
                } else {
                    $error = mysqli_error($db->mysqli);
                    return $error;
                }
            }
        }

        public function loginUser($db) {
            $email = mysqli_real_escape_string($db->mysqli, $this->email);
            $password = mysqli_real_escape_string($db->mysqli, $this->username);

            $query_user = "SELECT * FROM users WHERE email='$email' LIMIT 1";
            $query_user_result = $db->mysqli->query($query_user);

            if ($query_user_result->num_rows == 1) {
                $row = $query_user_result->fetch_assoc();
                
                $hashed_password = $row["password"];
                if (password_verify($this->password, $hashed_password)) {
                    $_SESSION["logged_in"] = "LOGGED_IN";
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["email"] = $row["email"];
                    // $_SESSION["user_activated"] = $row["user_activated"];
                    $_SESSION["user_title"] = $row["user_title"];
                    $_SESSION["password"] = $this->password;
                    $_SESSION["profile_image"] = $row["profile_image"];

                    $query_darkmode = "SELECT * FROM darkmode WHERE user_email='".$row["email"]."'";
                    $query_darkmode_result = $db->mysqli->query($query_darkmode);

                    if ($query_darkmode_result->num_rows == 1) {
                        $row_darkmode = $query_darkmode_result->fetch_assoc();

                        $_SESSION["darkmode"] = $row_darkmode["darkmode_status"];
                    } else {
                        $_SESSION["darkmode"] = "lightmode";
                    }

                    $stmt_darkmode = $db->mysqli->prepare("SELECT 1 FROM darkmode WHERE user_email=?");
                    $stmt_darkmode->bind_param("s", $_SESSION["email"]);
                    $stmt_darkmode->execute();
                    $stmt_darkmode->store_result();

                    // header("Location: /dashboard.php");
                    return $_SESSION["logged_in"];
                    exit;
                } else {
                    return "INVALID_CREDENTIALS";
                }
            } else {
                return "INVALID_CREDENTIALS";
            }
        }

        public function getAllActiveUser($db) {
            $query = "SELECT * FROM users WHERE user_activated = 1";
            $query_res = $db->mysqli->query($query);

            $active_users = array();
            while ($row = $query_res->fetch_assoc()) {
                $active_users[] = $row;
            }

            return $active_users;

        }
    }    
