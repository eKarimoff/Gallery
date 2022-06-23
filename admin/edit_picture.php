<?php 
include '../layouts/connect.php';

$id=$_GET['edit_picture'];
$sql="SELECT * FROM pictures WHERE id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$id= $row['id'];
$image= $row['image'];
$desc= $row['desc'];
$album_id= $row['album_id'];
?>