<?php include("includes/header.php"); ?>
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
        if(isset($_POST['Update']))
        {
                $user->username      =$_POST['Username'];
                $user->FirstName     =$_POST['FirstName'];
                $user->LastName      =$_POST['LastName'];
                $user->password      =$_POST['Password'];
               
                if(($_FILES['user_image']['error']==4))
                {
                    if($user->save())
                    {
                        
                        $session->set_notification('success','The User Updated successfully :)');
                    }
                    else{
                        
                        $session->set_notification('danger','The User did not update :(');
                    }
                }
                else
                {
                    $user->set_file($_FILES['user_image']);
                    if($user->save_user_and_image())
                    {
                        $session->set_notification('success','The User Updated successfully :)');
                    }
                    else{
                        
                        $session->set_notification('danger','The User did not  update :(');
                    }
                   
                }
                
        }

    }
    else{
        $session->set_notification('danger','user not exist');
        redirect("users.php");
    }






?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include("includes/top_nav.php")?>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           

            <?php include("includes/left_sidebar.php")?>



            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" >
                    <div class="col-lg-12">
                        <?php if($session->notificationExist()):?>
                            <div class="alert alert-<?php echo $session->notiGetType() ?> alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><?php echo strtoupper($session->notiGetType()) ?></strong> <?php echo $session->notiGetMsg()?>
                                <?php $session->delet_notificaion()?>
                            </div>
                        <?php endif;?>
                        <h1 class="page-header">
                            Edit User
                            
                        </h1>
                        <div class="col-md-6 col-md-offset-3">
                            <img class="img-responsive" src="<?php echo $user->image_path_and_placeholder();?>" alt="">
                        
                        
                        </div>
                        <br>
                        <form  method="post" enctype="multipart/form-data">
                        
                        <div class="col-md-6 col-md-offset-3">


                        <div class="form-group">

                                
                                <input type="file" name="user_image" id="Username" >


                            </div>
                        
                            <div class="form-group">

                                <label for="Username">Username</label>
                                <input type="text" name="Username" id="Username" class="form-control" value="<?php echo $user->username; ?>" required>


                            </div>



    
                            <div class="form-group">
                                <label for="FirstName">FirstName</label>
                                <input type="text" name="FirstName" id="FirstName" class="form-control" value="<?php echo $user->FirstName; ?>" required >
                                
                            </div>



                            <div class="form-group">
                                <label for="LastName">LastName</label>
                                <input type="text" name="LastName" id="LastName" class="form-control" value="<?php echo $user->LastName; ?>" required>
                                
                            </div>


                            <div class="form-group">
                                <label for="Password">New Password</label>
                                <input type="password" name="Password" id="Password" class="form-control" value="<?php echo $user->password; ?>" required>
                                
                            </div>


                            <div class="form-group">
                                
                                <input type="submit" name="Update" class="btn btn-success btn-lg btn-block" value="Update">

                            </div>
                            <div class="form-group">
                                
                                <a class="btn btn-danger btn-lg btn-block" href="delete_user.php?id=<?php echo $user->ID;?>">Delete</a>

                            </div>
                            
                        </div>
                       
                    </form>




                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>