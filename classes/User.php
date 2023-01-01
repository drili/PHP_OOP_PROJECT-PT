<?php
    class User {
        public $username;
        public $password;
        public $email;

        public function __construct($data) {
            $this->username = $data["username"];
            $this->password = $data["password"];
            $this->email = $data["email"];
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
    }    
