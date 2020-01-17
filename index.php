<?php include("includes/header.php"); ?>
<?php


    $page=isset($_GET['page']) ? $_GET['page'] : 1;

    $item_per_page=4;
    $totoal_item=photo::count();
    
    $paginate=new Paginate($page,$item_per_page,$totoal_item);

    $sql="SELECT * FROM photos ";
    $sql.=" LIMIT {$item_per_page}";
    $sql.=" OFFSET {$paginate->offset()}";
    


    $photos=photo::find_by_query($sql);
    


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
                <div class="row">
                     <ul class="pagination justify-content-center">
                      

                        
                        
                     <li class="page-item <?php echo $paginate->has_previous() ? null : "disabled" ;?>"><a href="<?php echo $paginate->has_previous() ? "index.php?page=".$paginate->previous() : "" ;?>">Previous</a></li>
                        
                   
                   
                    <?php 
                    
                    for($i=1;$i<=$paginate->page_total();++$i){
                        if($i==$paginate->current_page)
                        {

                           echo  "<li class='page-item active'>
                            <a class='page-link' href='index.php?page=$i'>$i <span class='sr-only'>(current)</span></a>
                          </li>";


                         

                            
                        }
                        else
                        {
                            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"index.php?page=$i\">$i</a></li>";
                        }


                    }
                    
                    
                    
                    
                    
                    ?>
                      
                            <li class="page-item <?php echo $paginate->has_next() ? null : "disabled" ;?>"><a href="<?php echo $paginate->has_next() ? "index.php?page=".$paginate->next() : "" ;?>">Next</a></li>
                         
                
                </div> 
         

            </div>

        <?php include("includes/footer.php"); ?>
