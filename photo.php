
<?php include("includes/header.php"); ?>
<?php
if(empty($_GET['id']))
{

    redirect("index.php");



}
$photo=photo::find_by_id($_GET['id']);

if(isset($_POST['submit']))
{
    file_put_contents("hello.txt","hello");
    $author=trim($_POST['author']);
    $body=trim($_POST['body']);
    file_put_contents("hello.txt",json_encode($_POST));
    
    $comment=Comment::create_comment($photo->photo_id,$author,$body);
    

    if($comment && $comment->save())
    {
        redirect("photo.php?id={$photo->photo_id}");
    }

    
}
$comments=comment::find_the_comment($photo->photo_id);




?>





   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title;?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Masoud</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo "admin".DS.$photo->GetPicPath(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->Caption;?></p>
                <p class="lead"><?php echo $photo->description;?></p>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="post" role="form">
                    <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php foreach($comments as $comment):?>
                <div class="media">
                    
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        <?php echo $comment->body; ?>
                    </div>
                     
                </div>
                <?php endforeach;?>

                <!-- Comment -->
                <!-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">fsdfsaf
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment 
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div> -->
                        <!-- End Nested Comment
                    </div>
                </div> -->

            </div> 

            <!-- Blog Sidebar Widgets Column -->
        

                <!-- Blog Search Well -->
                

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include("includes/footer.php"); ?>


