<?php

  class html {

    /**
     * Creates fotr the selectBox the option
     * @param  [array] $selectArray [With the key and the value in it]
     * @return [string]              [Returns a option]
     */
    public function createSelectbox($contacts, $columNames) {
      $selectBox = "<select onchange='contact.read(this.value)'>";
      foreach ($contacts as $key => $value) {
        $selectBox .= '<option value="' . $value[$columNames[0]] . '">' . $value[$columNames[1]] . '</option>';
      }
      $selectBox .= "</select>";
      return ($selectBox);
    }
  }


?>
