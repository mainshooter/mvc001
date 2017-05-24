<?php
  require_once 'databaseHandler.class.php';

  class ContactsService {


    public function readContacts($orderBy) {
      // Reads all the contacts
      $db = new db();

      $sql = "SELECT * FROM contact ORDER BY :orderColName";
      $input = array(
        "orderColName" => $orderBy
      );
      $contacts = $db->readData($sql, $input);
      return($contacts);
    }
  }

?>
