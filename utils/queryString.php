<?php
    // Get query string
    function getQueryString($string) {
        if(isset($_GET[$string])) {
            return $_GET[$string];
        }
        return "";
    }
    
    // Post query string
    function postQueryString($string) {
        if(isset($_POST[$string])) {
            return $_POST[$string];
        }
        return "";
    }
?>