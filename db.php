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
          // TO DO - Query to fetch each migration and execute the rollback
          $sql = "TRUNCATE TABLE `migrations` ";
          $db_connection->exec($sql);
          printf("Successfully purged the database and deleted all the tables. \n");
        }
        protected function up() {
          printf("Running previous migration. \n");
        }
        protected function down() {
          printf("Running next migration. \n");
        }
        protected function run() {
            printf("Running the migration files. \n");
            $db_connection = $this->connect();
            $sql = "CREATE TABLE IF NOT EXISTS `migrations` (migrations varchar(255))";
            $db_connection->exec($sql); 
            printf("Verifying table. \n");
        }
        protected function add_row($currentdate) {
            printf("Creating the migration row in the table. \n");
            $db_connection = $this->connect();
            $sql = "INSERT INTO `migrations` values ($currentdate)";
            $db_connection->exec($sql);
            printf("Successfully created the migration files. \n");
        }
    }
?>
