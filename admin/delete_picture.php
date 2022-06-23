<?php 
include '../layouts/connect.php';
if(isset($_GET['delete_pic'])){
    $id=$_GET['delete_pic']; 

    $delete="DELETE FROM pictures WHERE id=$id";
    $result=mysqli_query($con,$delete);
//     if($result){
        
//        header('location:admin_see_picture.php');
//    }
   
}
?>