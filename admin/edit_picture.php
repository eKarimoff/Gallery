<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
include '../layouts/connect.php';
include '../layouts/app.php';

if(isset($_GET['edit_pic'])){
    $id = $_GET['edit_pic'];
    $sql = "SELECT * FROM pictures WHERE id=$id";
    $query = mysqli_query($con,$sql);
    
    while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $desc = $row['description'];
    $album_id  = $row['album_id'];
    $image = '../upload_picture/'. $row['image']; 
?>
<div class="container mt-5" style="width:700px">

<form action="update_picture.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id"  value="<?php echo $id ?>">
   
    <div class="form-group">
        <label>Old Image</label>
        <img src="<?php echo $image ?>" width="400px" height="200px" style="border-radius:20px; border:3px solid white" required>
        <input type="file" name="picture" value="<?php echo $image ?>" class="form-control mt-4" required>
         <label>Description</label>
         <input type="text"name="description" value="<?php echo $desc ?>" class="form-control" required>
    </div>
 
    <select name="album_id" class="form-control mt-2" required>
            <option value="" class="form-control">Select Album</option>
            <?php
            
           $sql= "SELECT * FROM albums WHERE id";
           $result = mysqli_query($con,$sql);
           while($row = mysqli_fetch_array($result)){
              ?>
            <option value="<?php echo  $row['id'] ?>"><?php echo $row['name']?></option>
            <?php }  ?>
        </select>
        <div style="text-align:center;" class="mt-3">
        <a href="admin_see_album.php" class="btn btn-danger">Cancel</a>
        <button type="submit" name="update_picture" class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
  

    <?php 
    }
}
?>