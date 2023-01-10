<?php
    // * Composer requires
    require $root_directory . '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable($root_directory);
    $dotenv->load();

    class Sprints {
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

        public function getCurrentMonthYear() {
            $month = date("F");
            $year = date("Y");

            return "$month $year";
        }

        public function getCurrentSprintID() {
            $current_month_year = $this->getCurrentMonthYear();
            $query = "SELECT sprint_id FROM sprints WHERE sprint_name = '$current_month_year'";
            $query_res = $this->db->mysqli->query($query);
            $row = $query_res->fetch_assoc();

            return $row["sprint_id"];
        }

        // *** getValidSprints, sprints that during and after current sprint_id
        public function getValidSprints() {
            $current_sprint_id = $this->getCurrentSprintID();
            $query = "SELECT * FROM sprints WHERE sprint_id >= $current_sprint_id";
            $query_res = $this->db->mysqli->query($query);

            $sprint_array = array();
            while ($row = $query_res->fetch_assoc()) {
                $sprint_array[] = $row;
            }

            return $sprint_array;
        }

        public function getSprintVerticals() {
            $query = "SELECT * FROM task_verticals";
            $query_res = $this->db->mysqli->query($query);

            $task_verticals_array = array();
            while ($row = $query_res->fetch_assoc()) {
                $task_verticals_array[] = $row;
            }

            return $task_verticals_array;
        }

        public function getSprintLabels() {
            $query = "SELECT * FROM task_labels";
            $query_res = $this->db->mysqli->query($query);

            $task_labels_array = array();
            while ($row = $query_res->fetch_assoc()) {
                $task_labels_array[] = $row;
            }

            return $task_labels_array;
        }

    }