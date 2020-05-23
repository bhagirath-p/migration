<?php
    $good_sql = 'CREATE TABLE `roles` (`id` INT(11), `name` VARCHAR(255))'; // Query for migration
    $bad_sql = 'DROP TABLE `roles`'; // Query for rollback
 ?>
