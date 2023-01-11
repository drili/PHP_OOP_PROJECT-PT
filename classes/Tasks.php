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
        public $task_low;
        public $task_high; 
        public $task_workflow_status; 
        public $task_description;
        public $sprint_id;
        public $customer_id;
        public $label_id;
        public $created_by;

        public function __construct() {
            $this->hostname = $_ENV["HOSTNAME"];
            $this->username = $_ENV["USERNAME"];
            $this->password = $_ENV["PASSWORD"];
            $this->database = $_ENV["DATABASE"];

            $this->db = new DBConnection($this->hostname, $this->username, $this->password, $this->database);
        }

        public function createTask() {
            $task_name = mysqli_real_escape_string($this->db->mysqli, $this->task_name);
            $task_low = mysqli_real_escape_string($this->db->mysqli, $this->task_low);
            $task_high = mysqli_real_escape_string($this->db->mysqli, $this->task_high);
            $task_description = mysqli_real_escape_string($this->db->mysqli, $this->task_description);
            $customer_id = mysqli_real_escape_string($this->db->mysqli, $this->customer_id);
            $label_id = mysqli_real_escape_string($this->db->mysqli, $this->label_id);
            $task_vertical_id = mysqli_real_escape_string($this->db->mysqli, $this->task_vertical_id);
            $user_id = mysqli_real_escape_string($this->db->mysqli, $this->user_id);

            foreach ($this->sprint_id as $sprint_id) {
                $query = "INSERT INTO tasks
                (task_name, 
                task_low, 
                task_high, 
                task_workflow_status, 
                task_description, 
                sprint_id, 
                customer_id, 
                label_id,
                task_vertical_id,
                created_by) VALUES
                ('". $task_name ."',
                '". $task_low ."',
                '". $task_high ."',
                '". $sprint_id ."',
                '". $task_description ."',
                '". $sprint_id ."',
                '". $customer_id ."',
                '". $label_id ."',
                '". $task_vertical_id ."',
                '". $user_id ."')";
    
                $this->db->mysqli->query($query);

                // *** Insert task persons into "tasks_persons"
                $task_id_inserted = mysqli_insert_id($this->db->mysqli);
                foreach ($this->task_persons as $person_id) {
                    $query = "INSERT INTO tasks_persons
                    (task_id,
                    person_id) VALUES
                    ('". $task_id_inserted ."',
                    '". $person_id ."')";

                    $this->db->mysqli->query($query);
                }
            }

            if (mysqli_affected_rows($this->db->mysqli) > 0) {
                return "SUCCESS_TASK_CREATED";
            } else {
                return "ERR_CREATING_TASK";
            }
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