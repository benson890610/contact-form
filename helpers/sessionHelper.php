<?php

    function session($type, $message) {
        $_SESSION[$type] = $message;
    }

    function output_message() {
        if(isset($_SESSION['success'])) {
            $message = "<div class=\"alert alert-success mt-4\">". $_SESSION['success'] ."</div>";
            unset($_SESSION['success']);
            return $message;
        }
        if(isset($_SESSION['error'])) {
            $message = "<div class=\"alert alert-danger mt-4\">". $_SESSION['error'] ."</div>";
            unset($_SESSION['error']);
            return $message;
        }
    }


    function setSessionError($type, $message) {
        $_SESSION[$type] = $message;
    }

    function sessionMessage($type) {
        if(isset($_SESSION[$type])) {
            $message = $_SESSION[$type];

            return $message;
        }

        return '';
    }

    function checkSession($type) {
        return isset($_SESSION[$type]) ? 'is-invalid' : '';
    }

    function clearContactSessions() {
        $keys = ['email', 'subject', 'message'];
        $num = count($keys);

        for($i = $num; $i > 0; $i--) {
            if(isset($_SESSION[$keys[$i - 1]])) unset($_SESSION[$keys[$i - 1]]);
        }
    }