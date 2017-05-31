<?php

  class html {

    /**
     * Creates fotr the selectBox the option
     * @param  [array] $selectArray [With the key and the value in it]
     * @return [string]              [Returns a option]
     */
    public function createSelectbox($contacts, $columNames) {
      $selectBox = "<select onchange='contact.mailAdressSelect(this.value)'>";
      $selectBox .= '<option></option>';
      foreach ($contacts as $key => $value) {
        $selectBox .= '<option value="' . $value[$columNames[0]] . '">' . $value[$columNames[1]] . '</option>';
      }
      $selectBox .= "</select>";
      return ($selectBox);
    }

    /**
     * Create a select selectBOX
     * @param  [assoc array] $contacts   [The result from the db]
     * @param  [array] $columNames [With all colum names started with the ID]
     * @param  [INT] $highlateID [The ID of the colum that we wanted to highlight]
     * @return [string]             [Returns the creates selectBOX]
     */
    public function createSelectedSelectbox($contacts, $columNames, $highlateID) {
      $selectBox = "<select>";
      foreach ($contacts as $key => $value) {
        if ($value[$columNames[0]] == $highlateID) {
          $selectBox .= '<option value="' . $value[$columNames[0]] . '" selected>' . $value[$columNames[1]] . '</option>';
        }

        else {
          $selectBox .= '<option value="' . $value[$columNames[0]] . '">' . $value[$columNames[1]] . '</option>';
        }

      }
      $selectBox .= "</select>";
      return($selectBox);
    }
  }


?>
