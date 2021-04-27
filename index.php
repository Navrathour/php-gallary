<?php require_once("includes/header.php");?>
<?php require_once("admin/includes/init.php");?>
<?php

$page=!empty($_GET['page']) ? (int)$_GET['page'] : 1;

$items_per_page=4;

$items_total_count=Photo::count_all();

$paginate =new Paginate($page ,$items_per_page, $items_total_count);

$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";
//print_r($sql);
$photos=Photo::find_by_query($sql);

?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <div class="thumbnails row">
                    <?php  foreach($photos as $photo):?>
                    <div class="col-xs-6 col-md-3">
                        <a class="thumbnail" href="">
                            <img src="admin/<?php echo $photo->picture_path();?>" alt="">
                        </a>
                    </div>
                
                    <?php endforeach;?>
                </div>
                <div class="row">
                <ul class="pagination">
                <?php 
                   if($paginate->page_total() > 1){
                    if($paginate->has_next()){
                        echo "<li class='next'><a href='index.php?page={$paginate->next()}'>NEXT</a></li>";
                    }
                    
                    if($paginate->previous()){
                        echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                    }

                    for($j=1;$j<=$paginate->page_total();$j++){
                        if($j == $paginate->current_page){
                            echo "<li class='active'><a href='index.php?page={$j}'>{$j}</a></li>";
                        }else{
                            echo "<li class='active'><a href='index.php?page={$j}'>{$j}</a></li>";
                        }
                    }

                   } 
               
                ?>
                </ul>
                
                
                </div>
          
         

            </div>




            <!-- Blog Sidebar Widgets Column -->
             <!--<div class="col-md-4">

            
                 <!--  include("includes/sidebar.php");  -->



        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
