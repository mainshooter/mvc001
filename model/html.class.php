<?php

  class html {

    /**
     * Create selectbox with the posibility to highlight a select option when the
     * columNames[0] == $highlateID/columNames[2]
     * @param  [assoc array] $contacts [the result from the db]
     * @param  [array] $columNames [All the columNames includeing the highlatedID]
     * @return [string] [With the HTML selectBox]
     */
    public function createSelectBox($arr, $columNames, $JSevent) {
      $highlateID = ISSET($columNames[2])?$columNames[2]: NULL;
      $JSevent = ISSET($JSevent)?$JSevent: NULL;

      $selectBox = "<select " . $JSevent . ">";
      foreach ($arr as $key => $value) {
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
