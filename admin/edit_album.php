<?php
include '../layouts/connect.php';
?>

    

<?php 

    $id=$_GET['edit_id'];
    $sql="SELECT * FROM pictures WHERE id=$id";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
    $id= $row['id'];
    $image= $row['image'];
    $desc= $row['description'];
    $album_id= $row['album_id'];
?>

<form action="" method="POST">
    <input type="hidden" name="edit_id"  value="<?php echo $id ?>">
   
    <div class="form-group">
         <label>Description</label>
         <input type="text"name="edit_description" value="<?php echo $desc ?>"class="form-control">
    </div>
    <div class="form-group">
        <label>Upload Image</label>
        <input type="file"name="edit_picture" value="<?php echo $image ?>" class="form-control">
    </div>
    <?php }?>
    <select name="album_id" class="form-control mt-2">
            <option value="" class="form-control">Select a album</option>
            <?php
           $sql= "SELECT * FROM albums";
           $result=mysqli_query($con,$sql);
           while($row=mysqli_fetch_assoc($result)){
               ?>
            <option value="<?php echo  $row['id']?>"><?php echo $row['name']?></option>
            <?php }  ?>
        </select>
    </form>
  
    <a href="admin_see_picture.php" class="btn btn-danger"> CANCEL </a>
    <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
                                                                                               
