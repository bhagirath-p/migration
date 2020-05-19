<?php
    require_once 'db.php';
    class DBOpsClass extends DBClass {
        function __construct() {
            // Standard Constructor
        }
        public function execute($argu) {
            switch ($argu) {
                case 'migrate':
                    printf("Building migrating table.\n");
                break;
                case 'purge' : 
                    printf("Purging the database.\n");
                    $files = glob('migrations/*'); // get all file names
                    foreach($files as $file) { // iterate files
                        if(is_file($file))
                            unlink($file); // delete file
                    }
                    $this->clean();
                break;
                case 'create' :
                    printf("Creating the migration file.\n");
                    $currentdate = date("yymdHis");
                    printf($currentdate."\n");
                    // Create a new migration file
                    $migration_file = fopen("migrations/".$currentdate.".php", "w") or die("Unable to open file!");
                    $code = "John Doe\n";
                    fwrite($migration_file, $code);
                    fclose($migration_file); 
                    $this->add_row($currentdate);
                break;
                case 'run':
                    $this->run();
                break;
            }
          
        }
    }
    $dbops = new DBopsClass();
    $dbops->execute($argv[1]);
?>
