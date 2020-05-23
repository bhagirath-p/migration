<?php
    $good_sql = 'CREATE TABLE `logs` (`id` INT(11), `description` varchar(255))'; // Query for migration
    $bad_sql = 'DROP TABLE `logs`'; // Query for rollback
 ?>
