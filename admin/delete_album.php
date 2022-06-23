<?php 
include '../layouts/connect.php';
if(isset($_GET['delete_album'])){
    $id=$_GET['delete_album']; 
    $delete="DELETE FROM albums WHERE id=$id";
    $result=mysqli_query($con,$delete);
    if($result){
   
        header('location:admin_see_album.php');

   }
    
}
?>