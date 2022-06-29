<?php
session_start();
include '../layouts/connect.php';
if(isset($_POST['update_picture'])){

    $id = $_POST['id'];
    $desc = $_POST['description'];
    $album_id = $_POST['album_id'];
    $picture = $_FILES['picture']['name'];
    
   echo $update = "UPDATE pictures SET image = '$picture', description = '$desc', album_id = '$album_id' WHERE id = '$id'";
    $run = $con->query($update);
   
if($run)
{
    move_uploaded_file($_FILES["picture"]["tmp_name"],"../upload_picture/".$_FILES["picture"]["name"]);
    $_SESSION['flash'] = "Successfully updated";
    header("Location:admin_see_album.php");
   
}
else
{
    $_SESSION['flash'] = "error";
    // header("Location:admin_see_album.php");
}
}

?>