<?php
  class table {
    // Creates a table

    public function createTable($array) {
      $table = '<table>';
      foreach ($array as $key) {
        $table .= '<tr>';
        foreach ($key as $row => $value) {
          if ($row == 'contactID') {
            $table .= '<td><a href="?op=show&contactID=' . $value .'">' . $value . '</a></td>';
          }
          else {
            $table .= '<td>' . $value . '</td>';
          }
        }
        $table .= '<td><a href="?op=delete&contactID=' . $key['contactID'] . '">DELETE</a></td>';
        $table .= '</tr>';
      }
      $table .= '</table>';
      return($table);
    }
  }



?>
