<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>

<?php
if(empty($_GET['id'])){
    redirect('photos.php');
}
$commments = Commment::find_the_comments($_GET['id']);

?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            

            <?php include("includes/top_nav.php");?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                
            <?php include("includes/side_nav.php");?>  
             

            <!-- /.navbar-collapse -->
            
        </nav>




        <div id="page-wrapper">
         
        <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Commments
                        </h1>
                        <p class="bg-success"><?php echo $message?></p>
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($commments as $commment): ?>
                                    <tr>
                                        <td><?php echo $commment->id; ?></td>
                                        <td><?php echo $commment->author; ?>
                                            <div class="actions_link">
                                                <a href="delete_comment_photo.php?id=<?php echo $commment->id?>">Delete</a>
                                            </div>
                                        </td>
                                        <td><?php echo $commment->body; ?></td>
                                    </tr>
                                <?php endforeach;?>  
                                </tbody>
                            </table>
                            <!----end of table--->
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>