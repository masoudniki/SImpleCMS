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
    redirect("Commnets.php");
  }

  $comment=comment::find_by_id($_GET['id']);
  
  if($comment)
  {

    $comment->delete();
    $session->set_notification("success","comment Delted successfully!");
    redirect("Commnets.php");
    

  }
  else{

    
    $session->set_notification("danger","comment Does not exist");
    redirect("Commnets.php");
      
  }





?>