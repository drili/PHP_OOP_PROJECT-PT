<?php
    function createForm($form_id, $form_action, $form_method, $form_elements, $submit_value) {
        ob_start();

        if (empty($submit_value) || $submit_value === NULL) {
            $submit_value = "Submit";
        }

        echo "<div class='form-element'>";
            echo "<form id='" . $form_id . "' action='" . $form_action . "' method='" . $form_method . "'>";
                foreach ($form_elements as $element) {
                    echo "<label>" . $element["label"] . "</label>";
                    echo "<input type='" . $element["type"] . "' name='" . $element["name"] . "' value='" . $element["value"] . "'>";
                }

                echo "<input type='submit' value='" . $submit_value . "'>";
            echo "</form>";
        echo "</div>"; // .form-element

        $form = ob_get_contents();
        ob_end_clean();

        return $form;
    }