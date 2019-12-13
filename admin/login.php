<?php require_once("includes/header.php"); ?>
<?php
    if($session->is_signed_in())
    {
        redirect("index.php");
    }
    
    if(isset($_POST['submit'])){
    
        
        $username=trim($_POST['username']);
        $password=trim($_POST['password']);

        /// Method to check database user
        $user_found=User::verify_user($username,$password);

        

        if($user_found)
        {
            $session->login($user_found);
            $session->set_notification("success","Login successfully!");
            redirect("index.php");

        }
        else{


            $the_message="sorry your username or password is incorrect";
            

        }
        

    }
    else{

        $username="";
        $password="";

    }

    


?>

<div class="col-md-4 col-md-offset-3">

    <?php if(!empty($the_message)):?>

      
        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>oppos!</strong> <?php echo $the_message?>
        </div>
    
    <?php endif;?>
    
        
    <form id="login-id" action="" method="post">
        
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username)?>" >

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password)?>">
            
        </div>


        <div class="form-group">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>


    </form>


</div>
<?php require_once("includes/footer.php")?>