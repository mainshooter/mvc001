<?php
  require_once 'model/table.php';
  $table = new table();
  echo $table->createTable($contacts);
  // Displays the table
?>
