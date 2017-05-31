<?php
  class table {
    // Creates a table

    public function createTable($header, $array) {
      $table = '<table>';
      foreach ($header as $key) {
        $table .= '<tr>';
        foreach ($key as $row => $value) {
          $table .= '<th><a href="?orderby=' . $row . '">' . $row . '</th>';
        }
        $table .= '</tr>';
      }

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
        $table .= '
          <td><a href="?op=delete&contactID=' . $key['contactID'] . '">DELETE</a></td>
          <td><a href=?op=updateForm&contactID=' . $key['contactID'] . '>Update</a></td>
        ';
        $table .= '</tr>';
      }
      $table .= '</table>';
      return($table);
    }

    public function updateTable($array) {
      // Creates a update table for a contact
      $table = '
        <table>
          <form method="post">
      ';
      foreach ($array as $key) {
        $table .= '<tr>';
        foreach ($key as $row => $value) {
          if ($row == 'contactID') {

          }
          else {
            $table .= '<td><input type="text" name="' . $row . '" value="' . $value . '"></td>';
          }
        }
        $table .= '
          <td><input type="submit" name="op" value="update"></td>
        </tr>';
      }
      $table .= '
          </form>
        </table>';
      return($table);
    }
  }



?>
