<?php

    function AutoLoadClass($class)
    {
        $class=strtolower($class);
        $the_path="includes/{$class}.php";
        if(file_exists($the_path) && !class_exists($class))
        {
            require($the_path);
        }
        else
        {
            die("sorry the class {$class} not founded to use it....");
        }



    }
    spl_autoload_register('AutoLoadClass');

    function redirect($location)
    {

        header("Location: $location");


    }






?>