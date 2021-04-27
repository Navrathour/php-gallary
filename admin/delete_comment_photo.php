<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>
<?php 
 if(empty($_GET['id'])){
    redirect("comments.php");
 }
 $comment = Commment::find_by_id($_GET['id']);
print_r($comment);
 if($comment){
    $comment->delete();
    $session->message("The comment with {$comment->id} has been deleted");
    redirect("comment_photo.php?id={$_GET['id']}");
 }else{
   redirect("comments.php");
 }
?>