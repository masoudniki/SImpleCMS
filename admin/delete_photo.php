<?php include("includes/init.php"); ?>
<?php
    if(!$session->is_signed_in())
    {
        redirect("login.php");
    }
    

?>
<?php

  if(empty($_GET['id']))
  {
    redirect("../photos.php");
  }
  
  $photo=photo::find_by_id($_GET['id']);





?>