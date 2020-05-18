<?php
    class DBClass {
        private $username = "test";
        private $password = "test1234";
        private $database = "test";
        private $port     = "3306";
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
