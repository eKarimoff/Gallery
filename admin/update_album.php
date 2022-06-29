<?php
session_start();
include '../layouts/connect.php';
if(isset($_POST['update_album'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $album = $_FILES['edit_album']['name'];
    
     $update = "UPDATE albums SET name = '$name', image = '$album' WHERE id = '$id'";
    $run = $con->query($update);
   
if($run)
{
    move_uploaded_file($_FILES["edit_album"]["tmp_name"],"../upload_album/".$_FILES["edit_album"]["name"]);
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