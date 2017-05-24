<?php
  class table {
    // Creates a table

    public function createTable($array) {
      $table = '<table>';
      foreach ($array as $key) {
        $table .= '<tr>';
        foreach ($key as $row => $value) {
          $table .= '<td>' . $value . '</td>';
        }
        $table .= '</tr>';
      }
      $table .= '</table>';
      return($table);
    }
  }



?>
