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
                            Photos
                            <small>Subheading</small>
                        </h1>
                        <div class="col-md-12">
                        
                            <table  class="table table-hover" >
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>ID</th>
                                        <th>Filename</th>
                                        <th>Title</th>
                                        <th>Size</th>
                                        <th>Comments</th>
                                    </tr>

                                </thead>

                                <tbody>
                                <?php
                                $photo=photo::find_all();
                                ?>
                                <tr> 
                                <?php foreach($photo as $obj):?>          
                                    
                                    
                                        <td><img style="max-width: 400px;max-height: 250px;border-radius=5px;" class="img-responsive img-photo-page" src="<?php echo $obj->GetPicPath()?>" alt="a pic">
                                            <div class="pictures_link">

                                                <a href="delete_photo.php?id=<?php echo $obj->photo_id ?>">Delete</a>
                                                <a href="edit_photo.php?id=<?php echo $obj->photo_id ?>">Edit</a>
                                                <a href="../photo.php?id=<?php echo $obj->photo_id?>">View</a>

                                            </div>

                                        
                                        
                                        </td>
                                        <td><?php echo $obj->photo_id; ?></td>
                                        <td><?php echo $obj->filename; ?></td>
                                        <td><?php echo $obj->title; ?></td>
                                        <td><?php echo $obj->size; ?></td>
                                        <td>
                                        
                                        <?php
                                        $comments=comment::find_the_comment($obj->photo_id);
                                        echo "<b>".count($comments)."</b>";
                                        
                        
                                        ?>
                                                    <div class="pictures_link">

                                                    
                                                    <a class="btn btn-primary" href="photo_comment.php?id=<?php echo $obj->photo_id; ?>" role="button" <?php if(count($comments)==0)echo "disabled";?> >Show Comment</a>

                                                    </div>
                                        
                                        
                                        </td>
                                        
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