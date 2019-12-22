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
        redirect("photos.php");
    }
    else{

        $photo=photo::find_by_id($_GET['id']);
        if($photo)
        {
            if(isset($_POST['update']))
            {
                   $photo->title          =$_POST['title'];
                   $photo->caption        =$_POST['Caption'];
                   $photo->alternatetext  =$_POST['AlternateText'];
                   $photo->description    =$_POST['Description'];
                   $photo->save();
                   $session->set_notification("success","Picture Edited successfully!");

            }
        }
        else
        {
            $session->set_notification("danger","Picture Does not exist");
            redirect("photos.php");
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
                            Photos
                            <small>Subheading</small>
                        </h1>
                        <form  method="post">
                        <div class="col-md-8">
                        
                            <div class="form-group">

                                <input type="text" name="title" id="" class="form-control" value="<?php echo $photo->title;?>">


                            </div>
                            <div class="form-group">
                                <label for="Caption">Caption</label>
                                <input type="text" name="Caption" id="Caption" class="form-control" value="<?php echo $photo->caption;?>" >
                                
                            </div>



                            <div class="form-group">
                                <label for="AlternateText">Alternate Text</label>
                                <input type="text" name="AlternateText" id="AlternateText" class="form-control" value="<?php echo $photo->alternatetext;?>" >
                                
                            </div>


                            <div class="form-group">
                                <label for="Description">Description</label>
                               <textarea class="form-control" name="Description" id="Description" cols="30" rows="10"  ><?php echo $photo->description;?></textarea>
                                
                            </div>


                            

                        </div>
                        <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                   <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                                 <p class="text">
                                   <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                  </p>
                                  <p class="text ">
                                    Photo Id: <span class="data photo_id_box"><?php echo $photo->photo_id;?></span>
                                  </p>
                                  <p class="text">
                                    Filename: <span class="data"><?php echo $photo->filename;?></span>
                                  </p>
                                 <p class="text">
                                  File Type: <span class="data"><?php echo $photo->type;?></span>
                                 </p>
                                 <p class="text">
                                   File Size: <span class="data"><?php echo floor(($photo->size)/1000);?> KB</span>
                                 </p>
                              </div>
                              <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_photo.php?id=<?php echo$photo->photo_id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>   
                              </div>
                            </div>          
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