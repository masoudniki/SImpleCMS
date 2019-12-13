<?php
    require_once("includes/header.php");
    if($session->is_signed_in())
    {

        $session->logout();
        redirect("login.php");


    }
    else{
        redirect("login.php");
    }




?>