<?php

    ini_set('display_errors', 'on');

    if($_SERVER["REQUEST_METHOD"] === "POST") {

        session_start();

        require "helpers/sessionHelper.php";

        spl_autoload_register(function($className){
            if(file_exists("library/classes/" . $className . ".php")) {
                require "library/classes/" . $className . ".php";
            }
        });

        $form = new FormHandler;
        $form->proccessContact();

    } else {
        header("Location: index.php");
        exit;
    }