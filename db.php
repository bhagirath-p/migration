<?php
    class DBClass {
        function __construct() {
            // Standard Constructor
        }
        function connect() {
            $dbConnection = new PDO('mysql:host=localhost;dbname=test', 'test', 'test1234');
            return $dbConnection;
        }
        protected function clean() {
          printf("Rolling back to first version \n");
          $db_connection = $this->connect();
          $sql = "DROP DATABASE `test`";
          $result = $db_connection->query($sql)->execute();
          $sql = "CREATE DATABASE `test`";
          $result = $db_connection->query($sql)->execute();
          printf("Successfully purged the database and deleted all the tables. \n");
        }
        protected function up() {
          printf("Running previous migration. \n");
        }
        protected function down() {
          printf("Running next migration. \n");
        }
        protected function run($currentdate) {
            printf("Running the migration files. \n");
            $db_connection = $this->connect();
            $sql = "CREATE TABLE IF NOT EXISTS `migrations` (migrations varchar(255))";
            $result = $db_connection->query($sql)->execute(); 
            $files = glob('migrations/*'); // get all file names
            foreach($files as $file) { // iterate files
                $file_name_string = explode("_", substr($file, 11));
                $this->add_row($file_name_string[0]);
                if(strcmp($currentdate, $file_name_string[0]) === 0) {
                    // Fetch contents of the fetch and run it.
                    ob_start(); // Start output buffer capture.
                    include($file); // Include file.
                    $output = ob_get_contents(); // This contains the outputp
                    // Manipulate $output...
                    ob_end_clean(); // Clear the buffer.
                    echo $output; // Print everything.
                    $result = $db_connection->query($good_sql)->execute();
                    if($result) {
                        printf("Table created. \n");
                    }
                }
            }
        }
        protected function add_row($currentdate) {
            $db_connection = $this->connect();
            $sql = "SELECT migrations FROM `migrations` WHERE migrations LIKE '%$currentdate%'";
            $result = $db_connection->query($sql)fetch();
            if(!$result) {
                $sql = "INSERT INTO `migrations` values ($currentdate)";
                $result = $db_connection->query($sql)->execute();
                $this->run($currentdate);
            }
        }
    }
?>
