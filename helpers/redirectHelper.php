<?php

    function redirect($page) {
        header("Location: " . $page . ".php");
        exit;
    }