<?php

  require_once 'model/ContactsService.php';
  require_once 'model/table.php';
  require_once 'model/html.class.php';

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
      $op = ISSET($_REQUEST['op'])?$_REQUEST['op']:NULL;
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

        else if ($op == 'emailSelectBox') {
          $this->getSelectBoxForMail();
        }
        else if ($op == 'newContact') {
          $this->newContactForm();
        }
        else if ($op == 'save') {
          $this->createData();
        }
        else if ($op == 'updateForm') {
          $this->updateForm();
        }
        else if ($op == 'update') {
          $this->updateData();
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

    public function showError($error) {
      echo "<h1>" . $error . "</h1>";
    }

    public function readAllData() {
      $orderby = ISSET($_GET['orderby'])?$_GET['orderby']:NULL;
      // Checks if the $_GET['orderby'] has been set
      // If it is we will set it with the get variable
      // Otherwise it will be NULL
      $html = new html();
      $table = new Table();

      $tableContent = $this->contactsService->readContacts($orderby);
      $headers = $this->contactsService->getColmNames();
      $array = ['contactID','Name'];
      $eventHandler = "onchange=contact.mailAdressSelect(this.value)";

      $contacts = $this->contactsService->readContacts($orderby);
      $selectBox = $html->createSelectBox($contacts, $array, $eventHandler);


      $table = $table->createTable($headers, $tableContent);
      // Execute the readAllData
      // It returns a table

      include 'view/contacts.php';
      // There we gonne display it
    }

    public function getSelectBoxForMail() {
      $highlateContactID = ISSET($_GET['highlateContactID'])?$_GET['highlateContactID']: NULL;
      // $columName1 = ISSET();

      $html = new html();
      $contacts = $this->contactsService->readContacts('');

      $columNames = ['contactID', 'Email', $highlateContactID];

      $selectBox = $html->createSelectBox($contacts, $columNames, '');

      $ajaxResult = $selectBox;
      include 'view/ajaxResult.php';
    }


    public function readData() {
      $contactID = ISSET($_GET['contactID'])?$_GET['contactID']:NULL;
      // If there is a contact ID we set it otherwise it will be 0

      $header = $this->contactsService->getColmNames();
      $tableContent = $this->contactsService->readContact($contactID);



      $table = new Table();
      $table = $table->createTable($header, $tableContent);

      include 'view/contact.php';
    }

    public function deleteData() {
      $contactID = ISSET($_GET['contactID'])?$_GET['contactID']:NULL;

      $result = $this->contactsService->deleteContact($contactID);
      include 'view/deleteResult.php';
    }

    public function newContactForm() {
      include 'view/createContactForm.html';
    }

    public function createData() {
      $result = $this->contactsService->createContact($_REQUEST);

      header("Location: index.php");
    }

    public function updateForm() {
      $contactID = ISSET($_GET['contactID'])?$_GET['contactID']:NULL;

      $contactDetail = $this->contactsService->readContact($contactID);
      $table = new table();
      $table = $table->updateTable($contactDetail);
      include 'view/updateForm.php';
    }

    public function updateData() {
      $formResult = ISSET($_REQUEST)?$_REQUEST:NULL;

      $contactUpdate = $this->contactsService->updateContact($_REQUEST);
      $this->readAllData();
      echo $contactUpdate;
    }
  }


?>
