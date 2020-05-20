<?php
    require_once 'db.php';
    class DBOpsClass extends DBClass {
        function __construct() {
            // Standard Constructor
        }
        public function execute($argu) {
            switch ($argu[1]) {
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
                    $filename = implode("_", array_slice($argu, 2));
                    printf("Creating the migration file.\n");
                    $currentdate = date("yymdHis");
                    // Create a new migration file
                    $migration_file = fopen("migrations/".$currentdate."_".$filename.".php", "w") or die("Unable to open file!");
                    $code = "<?php\n    \$good_sql = ''; // Query for migration\n    \$bad_sql = ''; // Query for rollback\n ?>";
                    fwrite($migration_file, $code);
                    fclose($migration_file); 
                    printf("Successfully created the migration files. \n");
                    printf($currentdate."\n");
                break;
                case 'run':
                    $files = glob('migrations/*'); // get all file names
                    foreach($files as $file) { // iterate files
                        $file_name_string = explode("_", substr($file, 11));
                        $this->add_row($file_name_string[0]);
                    }
                break;
            }
          
        }
    }
    $dbops = new DBopsClass();
    $dbops->execute($argv);
?>
