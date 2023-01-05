<?php
    class User {

        public $username;
        public $password;
        public $email;

        public function __construct($data) {
            if (isset($data["username"])) {
                $this->username = $data["username"];
            }
            if (isset($data["password"])) {
                $this->password = $data["password"];
            }
            if (isset($data["email"])) {
                $this->email = $data["email"];
            }
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
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["user_activated"] = $row["user_activated"];

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
    }    
