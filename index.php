<?php include("includes/header.php"); ?>
<?php
    $photos=photo::find_all();
    


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <div class="tuhmbnails row">
                  <?php foreach($photos as $photo):?>
                
                
                    <div class="col-xs-6 col-md-3">
                    
                    <a class="thumbnail" href="photo.php?id=<?php echo $photo->photo_id;?>">
                        <img  class=" img-responsive home_page_photo" src="admin/<?php echo $photo->GetPicPath();?>" alt="">
                    
                    </a>
                    
                    
                    </div>

                
                
                   
                <?php endforeach;?> 
                </div>  
         

            </div>

        <?php include("includes/footer.php"); ?>
