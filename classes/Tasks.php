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

        public $task_name;

        public function __construct() {
            $this->hostname = $_ENV["HOSTNAME"];
            $this->username = $_ENV["USERNAME"];
            $this->password = $_ENV["PASSWORD"];
            $this->database = $_ENV["DATABASE"];

            $this->db = new DBConnection($this->hostname, $this->username, $this->password, $this->database);
        }

        public function createTask() {
            $query = "INSERT INTO tasks
                (task_name, 
                task_low, 
                task_high, 
                task_workflow_status, 
                task_description, 
                sprint_id, 
                customer_id, 
                label_id,
                created_by) VALUES
                ('". $this->task_name ."',
                '". $this->task_low ."',
                '". $this->task_high ."',
                '0',
                '". $this->task_description ."',
                '". $this->sprint_id ."',
                '". $this->customer_id ."',
                '". $this->label_id ."',
                '". $this->user_id ."')";
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