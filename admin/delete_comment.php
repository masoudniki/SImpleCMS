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
    $refeer=basename($_SERVER['HTTP_REFERER']);
   
    $reffer_array=parse_url($refeer);
    $refeer_path=$reffer_array['path'];
    if($refeer_path=="photo_comment.php");
    {
      redirect($refeer);
    }
    if($refeer_path=="Commnets.php")
    {
      redirect($refeer_path);
    }
    
    

  }
  else{

    
    $session->set_notification("danger","comment Does not exist");
    redirect("Commnets.php");
      
  }





?>