<?php

  require_once 'model/ContactsService.php';

  class ContactsController {

    private $contactsService = NULL;
    // Private means it can only be used in this class
    // To prefent that someone acces it outside the class

    // Protected means that a chiled can acces the parent private variable or method
    // But from outside a class it can't be used

    // Public means every class can use it


    public function __construct() {
      // Everyone can use public
      $this->contactsService = new ContactsService();
    }

    public function handleRequest() {
      $op = ISSET($_GET['op'])?$_GET['op']:NULL;
      // Its called: Ternary Operators
      // if there is a op request variable
      // We set the variable with the request
      // Otherwise it will be NULL

      try {
        // We try this
        if (!$op || $op == 'list') {
          // If there is list in the request or there is nothing in the op variable
          $this->readAllData();
        }
        else if ($op == 'new') {
          $this->createData();
        }
        else if ($op == 'delete') {
          $this->deleteData();
        }
        else if ($op == 'show') {
          $this->readData();
        }
        else {
          // Displays a minor error when we didn't found anything
          $this->showError("Page not found", "Page for operation " . $op . " was not found!");
        }
      } catch (Exception $e) {
        // Exception is put in the $e variable
        // Well there is a massive error
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function readAllData() {
      $orderby = ISSET($_GET['orderby'])?$_GET['orderby']:NULL;

      $table = $this->contactsService->readContacts($orderby);
      include 'view/contacts.php';
      // There we gonne display it
    }

    public function readData() {
      $contactID = ISSET($_GET['contactID'])?$_GET['contactID']:NULL;
      // If there is a contact ID we set it otherwise it will be 0

      $table = $this->contactsService->readContact($contactID);
      include 'view/contact.php';
    }

    public function deleteData() {
      $contactID = ISSET($_GET['contactID'])?$_GET['contactID']:NULL;

      $result = $this->contactsService->deleteContact($contactID);
      include 'view/deleteResult.php';
    }
  }


?>
