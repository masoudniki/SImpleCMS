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
    redirect("users.php");
  }

  $user=user::find_by_id($_GET['id']);

  if($user)
  {

    $user->delete();
    $session->set_notification("success","User Delted successfully!");
    redirect("users.php");
    

  }
  else{

    
    $session->set_notification("danger","User Does not exist");
    redirect("users.php");
      
  }





?>