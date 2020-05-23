<?php
    $good_sql = 'CREATE TABLE `users` (`id` INT(11), `name` VARCHAR(255))'; // Query for migration
    $bad_sql = 'DROP TABLE `users`'; // Query for rollback
 ?>
