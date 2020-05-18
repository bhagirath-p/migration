<?php
    $dbConnection = new PDO('mysql:host=localhost;dbname=test', 'test', 'test1234');
    class DBClass {
        function __construct() {
            // Standard Constructor
        }
        public function drop() {
          printf("Dropping database. \n");
        }
        public function up() {
          printf("Running previous migration. \n");
        }
        public function down() {
          printf("Running next migration. \n");
        }
        public function run() {
            printf("Running the migration files. \n");
        }
    }
?>
