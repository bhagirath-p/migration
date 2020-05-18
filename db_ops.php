<?php
    require_once 'db.php';
    class DBOpsClass extends DBClass {
        function __construct() {
            // Standard Constructor
        }
        public function execute($argu) {
            switch ($argu) {
                case 'migrate': printf("Building Migrating Table.\n");
                break;
                case 'purge' : printf("Purging the database.\n");
                break;
                case 'create' : printf("Creating the migration file.\n");
                $currentdate = date("yymdHis");
                echo($currentdate);
                echo "\n"; 
                $this->add_row($currentdate);
                break;
                case 'run': $this->run();
                break;
            }
          
        }
    }
    $dbops = new DBopsClass();
    $dbops->execute($argv[1]);
?>
