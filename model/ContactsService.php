<?php
  require_once 'databaseHandler.class.php';
  require_once 'table.php';

  class ContactsService {


    public function readContacts($orderBy) {
      // Expects a string as order by
      // Reads all the contacts
      $db = new db();

      $sql = "SELECT * FROM contact ORDER BY :orderColName";
      $input = array(
        "orderColName" => $orderBy
      );
      $contacts = $db->readData($sql, $input);
      // The result form the database

      return($contacts);
      // Returns the created table as HTML
    }

    public function readContact($contactID) {
      // To get one contact
      $db = new db();

      $sql = "SELECT * FROM contact WHERE contactID=:contactID";
      $input = array(
        "contactID" => $contactID
      );
      $contactDetails = $db->readData($sql, $input);

      return($contactDetails);
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

    public function createContact($formResult) {
      $db = new db();

      $sql = "INSERT INTO contact (Name, Phone, Email, Adress) VALUES (:contact_name, :contact_phone, :contact_email, :contact_adress)";
      $input = array(
        "contact_name" => $formResult['contact_naam'],
        "contact_phone" => $formResult['contact_phone'],
        "contact_email" => $formResult['contact_mail'],
        "contact_adress" => $formResult['contact_place']
      );
      $result = $db->createData($sql, $input);
      return($result);
    }
  }

?>
