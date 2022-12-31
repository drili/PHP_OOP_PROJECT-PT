<?php

    class DBConnection {
        public $mysqli;

        public function __construct($hostname, $username, $password, $database) {
            $this->mysqli = new mysqli($hostname, $username, $password, $database);

            if ($this->mysqli->connect_error) {
                die("Connect Error (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error);
            } else {
                echo "<script>";
                    echo "console.log( '::: DBConnection: MySQL connection successful!' );";
                echo "</script>";
            }

            $this->mysqli->set_charset("utf8");
        }
    }