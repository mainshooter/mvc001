<?php
  require_once 'databaseHandler.class.php';
  require_once 'table.php';

  class ContactsService {


    public function readContacts($orderBy) {
      // Reads all the contacts
      $db = new db();

      $sql = "SELECT * FROM contact ORDER BY :orderColName";
      $input = array(
        "orderColName" => $orderBy
      );
      $contacts = $db->readData($sql, $input);

      $table = new Table();
      $table = $table->createTable($contacts);

      return($table);
    }

    public function readContact($contactID) {
      // To get one contact
      $db = new db();

      $sql = "SELECT * FROM contact WHERE contactID=:contactID";
      $input = array(
        "contactID" => $contactID
      );
      $contactDetails = $db->readData($sql, $input);

      $table = new Table();
      $table = $table->createTable($contactDetails);

      return($table);
    }

    public function deleteContact($contactID) {
      // Delete a contact
      $db = new db();

      $sql = "DELETE FROM contact WHERE contactID=:contactID";
      $input = array(
        "contactID" => $contactID
      );
      $result = $db->deleteData($sql, $input);
      return($result);
    }
  }

?>
