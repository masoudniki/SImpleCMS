<?php include("includes/header.php"); ?>
<?php
    if(!$session->is_signed_in())
    {
        redirect("login.php");
    }
    

?>
<?php
    if(isset($_POST['submit']))
    {
            $user=new user();
            $user->username      =$_POST['Username'];
            $user->FirstName     =$_POST['FirstName'];
            $user->LastName      =$_POST['LastName'];
            $user->password      =$_POST['Password'];
            $user->set_file($_FILES['user_image']);
            if($user->save_user_and_image())
            {
                $session->set_notification('success','The User added successfully :)');
            }
            else{
                $session->set_notification('danger','The User Didnt added!!!!');
            }
            
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
                            Add User
                            
                        </h1>
                        <form  method="post" enctype="multipart/form-data">
                        <div class="col-md-6 col-md-offset-3">


                        <div class="form-group">

                                
                                <input type="file" name="user_image" id="Username" required>


                            </div>
                        
                            <div class="form-group">

                                <label for="Username">Username</label>
                                <input type="text" name="Username" id="Username" class="form-control" required>


                            </div>



    
                            <div class="form-group">
                                <label for="FirstName">FirstName</label>
                                <input type="text" name="FirstName" id="FirstName" class="form-control" required>
                                
                            </div>



                            <div class="form-group">
                                <label for="LastName">LastName</label>
                                <input type="text" name="LastName" id="LastName" class="form-control"  required>
                                
                            </div>


                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="Password" id="Password" class="form-control" required>
                                
                            </div>


                            <div class="form-group">
                                
                                <input type="submit" name="submit" class="btn btn-success btn-lg btn-block">

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