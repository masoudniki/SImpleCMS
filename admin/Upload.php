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

        $photo=new Photo();
        $photo->title=isset($_POST['title']) ? $_POST['title'] : null ;
        $photo->set_file($_FILES['file_upload']);
        
        if($photo->save())
        {
            $session->set_notification("success","Pic Uploded successfully!");
        }
        else{
            var_dump($photo->custom_err);
        }

        unset($_POST);
        


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
                <div class="row">
                    <div class="col-lg-12">
                    <?php if($session->notificationExist()):?>
                            <div class="alert alert-<?php echo $session->notiGetType() ?> alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><?php echo strtoupper($session->notiGetType()) ?></strong> <?php echo $session->notiGetMsg()?>
                                <?php $session->delet_notificaion()?>
                            </div>
                        <?php endif;?>
                        <h1 class="page-header">
                            Upload
                            <small>Subheading</small>
                        </h1>
                        <div class="col-md-6">
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" >
                            
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" required>
                                
                                </div>
                                <div class="form-group">
                                
                                    <input type="file" name="file_upload" id="" required>
                                
                                </div>
                                <input type="submit" name="submit" value="submit">
                            
                            
                            </form>
                      </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>