<?php

session_start();

function message() {
    if (isset($_SESSION["message"])) {
        $output = "<div style=\"width: 100%; position: relative; overflow: hidden;\"><div class=\"message w3-card-4 w3-red\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div><div class=\"msg\">&nbsp;</div></div>";

        // clear message after use
        $_SESSION["message"] = null;

        return $output;
    } else {
        return '';
    }
}

function errors() {
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];

        // clear message after use
        $_SESSION["errors"] = null;

        return $errors;
    }
}

?>
