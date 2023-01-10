<?php
    // * Composer requires
    require $root_directory . '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable($root_directory);
    $dotenv->load();

    class Tasks {
        private $db;
        public $hostname;
        public $username;
        public $password;
        public $database;

        public function __construct() {
            $this->hostname = $_ENV["HOSTNAME"];
            $this->username = $_ENV["USERNAME"];
            $this->password = $_ENV["PASSWORD"];
            $this->database = $_ENV["DATABASE"];

            $this->db = new DBConnection($this->hostname, $this->username, $this->password, $this->database);
        }

        public function createTask() {

        }

        public function updateTask() {

        }

        public function deleteTask() {

        }

        public function fetchTask() {

        }

        public function fetchLatestTasks() {

        }
    }