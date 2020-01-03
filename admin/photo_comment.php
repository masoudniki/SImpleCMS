<?php include("includes/header.php"); ?>
<?php
    if(!$session->is_signed_in())
    {
        redirect("login.php");
    }
    

?>
<?php

    if(!isset($_GET['id']))
    {
        redirect("photos.php");
    }
    $comments=comment::find_the_comment($_GET['id']);
    if(!$comments)
    {
        redirect("photos.php");
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
                            Comments
                            
                        </h1>
                        <div class="md-col-4 pull-left" >
                        
                        <?php $photo=photo::find_by_id($_GET['id']); ?>
                        <img style="max-width: 400px;max-height: 250px;border-radius=5px;" class="img-responsive img-thumbnail" src="<?php echo $photo->GetPicPath()?>" alt="a pic">
                        
                        
                        </div>
                        <div class="col-md-8">
                        
                            <table  class="table table-hover" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>PhotoCommented</th>
                                        <th>Auther</th>
                                        <th>Body</th>
                                        
                                    </tr>

                                </thead>

                                <tbody>
                                
                                <tr> 
                                <?php foreach($comments as $comment):?>          
                                    
                                    
                                        
                                        <th><?php echo $comment->ID; ?></th>
                                       
                                        <td><?php echo "notin";; ?>
                                            <div class="pictures_link">

                                                    <a href="delete_comment.php?id=<?php echo $comment->ID ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
                                                   <!-- <a href="edit_user.php?id=<?php echo $comment->ID ?>"><button type="button" class="btn btn-info btn-xs">Edit</button></a> -->
                                                    

                                            </div>

                                        
                                        
                                        </td>
                                        <td><?php echo $comment->author; ?></td>
                                        <td><?php echo $comment->body; ?></td>
                                        
                                        
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