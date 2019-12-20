<?php include("includes/init.php"); ?>
<?php
    if(!$session->is_signed_in())
    {
        redirect("login.php");
    }
    

?>
<?php

    echo "<pre>";
    var_dump($_GET);
    echo "</pre>";




?>