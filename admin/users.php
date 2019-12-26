<?php include("includes/header.php"); ?>
<?php
    if(!$session->is_signed_in())
    {
        redirect("login.php");
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
                            users
                            <small>Subheading</small>
                        </h1>
                        <div class="col-md-12">
                        
                            <table  class="table table-hover" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Photo</th>
                                        <th>Username</th>
                                        <th>FirstName</th>
                                        <th>LastName</th>
                                        
                                    </tr>

                                </thead>

                                <tbody>
                                <?php
                                $user=user::find_all();
                                ?>
                                <tr> 
                                <?php foreach($user as $obj):?>          
                                    
                                    
                                        
                                        <th><?php echo $obj->ID; ?></th>
                                        <td><img class="img-responsive user_image" src="<?php echo $obj->image_path_and_placeholder()?>" alt="a pic"></td>
                                        <td><?php echo $obj->username; ?>
                                            <div class="pictures_link">

                                                    <a href="delete_user.php?id=<?php echo $obj->ID ?>">Delete</a>
                                                    <a href="edit_user.php?id=<?php echo $obj->ID ?>">Edit</a>
                                                    <a href="">View</a>

                                            </div>

                                        
                                        
                                        </td>
                                        <td><?php echo $obj->FirstName; ?></td>
                                        <td><?php echo $obj->LastName; ?></td>
                                        
                                        
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            
                            
                            
                            
                            
                            
                            
                            </table>

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        </div>




                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>