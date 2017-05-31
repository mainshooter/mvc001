<?php

  class html {

    /**
     * Creates fotr the selectBox the option
     * @param  [array] $selectArray [With the key and the value in it]
     * @return [string]              [Returns a option]
     */
    public function createSelectbox($selectArray) {
      foreach ($selectArray as $key => $value) {
        $option = "<option value=" . $key . ">" . $value . "</option>";
      }
      return($option);
    }
  }


?>
