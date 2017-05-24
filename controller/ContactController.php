<?php

  require_once 'model/ContactsService.php';

  class ContactsController {

    private var $contactsService = NULL;
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
      // op stands for operation
      // if there is a op request variable
      // We set the variable with the request
      // Otherwise it will be NULL
      try {
        if (!$op || $op === 'list') {
          // If there is list in the request or there is nothing in the op variable
          $this->readAllData();
        }
        else if ($op === 'new') {
          $this->createData();
        }
        else if ($op === 'delete') {
          $this->deleteData();
        }
        else if ($op === 'show') {
          $this->readData();
        }
        else {
          // Displays a error
          $this->showError("Page not found", "Page for operation " . $op . " was not found!");
        }
      } catch (Exception $e) {
        // Well there is a massive error
        $this->showError("Application error", $e->getMessage());
      }
    }

    public function readAllData() {
      $orderby = ISSET($_GET['orderby'])?$_GET['orderby']:NULL;
      $contacts = $this->contactsService->readContact($orderby);
      include 'view/contacts.php';
    }
  }


?>
