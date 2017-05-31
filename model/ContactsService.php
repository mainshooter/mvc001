<?php
  require_once 'databaseHandler.class.php';
  require_once 'table.php';

  class ContactsService {


    public function readContacts($orderBy) {
      // Expects a string as order by
      // Reads all the contacts
      $db = new db();
      echo $orderBy;

      $sql = "SELECT * FROM contact ORDER BY :orderColName DESC";
      $input = array(
        "orderColName" => $orderBy
      );

      $contacts = $db->readData($sql, $input);
      // The result form the database
      return($contacts);
      // Returns the created table as HTML
    }

    /**
     * Get all names and the IDs of the contacts
     * @return [array] [With the result from the DB]
     */
    public function getAllNamesWithID() {
      $db = new db();

      $sql = "SELECT contactID, Name FROM contact";
      $input = array();

      return($db->readData($sql, $input));
    }

    /**
     * Get all email adress with the ID of every contact
     * @return [assoc array] [The result from the db]
     */
    public function getAllMailAdressWithID() {
      $db = new db();

      $sql = "SELECT contactID, Email FROM contact";
      $input = array();

      return($db->readData($sql, $input));
    }

    public function getColmNames() {
      $db = new db();

      $sql = "SELECT * FROM contact LIMIT 1";
      $input = array();

      $headers = $db->readData($sql, $input);

      return($headers);
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

    public function updateContact($formResult) {
      $db = new db();

      $sql = "UPDATE contact SET Name=:contact_name, Phone=:contact_phone, Email=:contact_email, Adress=:contact_adress WHERE contactID=:contactID";
      $input = array(
        "contact_name" => $formResult['Name'],
        "contact_phone" => $formResult['Phone'],
        "contact_email" => $formResult['Email'],
        "contact_adress" => $formResult['Adress'],
        "contactID" => $formResult['contactID']
      );

      $result = $db->updateData($sql, $input);
      return($result);
    }
  }

?>
