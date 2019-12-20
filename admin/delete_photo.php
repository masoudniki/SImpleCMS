<?php include("includes/init.php"); ?>
<?php
    if(!$session->is_signed_in())
    {
        redirect("../login.php");
    }
    

?>
<?php

  if(empty($_GET['id']))
  {
    redirect("photos.php");
  }

  $photo=photo::find_by_id($_GET['id']);

  if($photo)
  {

    $photo->delete_photo();
    $session->set_notification("success","Pic Deleted successfully!");
    redirect("../photos.php");
    

  }
  else{

    
    $session->set_notification("danger","Picture Does not Deleted");
    redirect("../photos.php");
      
  }





?>