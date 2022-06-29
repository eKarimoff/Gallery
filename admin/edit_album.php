<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
include '../layouts/connect.php';
include '../layouts/app.php';

    if(isset($_GET['edit_album'])){
    $id=$_GET['edit_album'];
    $sql="SELECT * FROM albums WHERE id=$id";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $name = $row['name'];
    $image = '../upload_album/'. $row['image'];
?>
<div class="container mt-5" style="width:700px">

<form action="update_album.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id"  value="<?php echo $id ?>">
    <div class="form-group">
        <label>Old Image</label>
        <img src="<?php echo $image?>" width="400px" height="250px" style="border-radius:25px" class="form-control" required>
        <input type="file" name="edit_album" value="<?php echo $image ?>" class="form-control mt-4" required>
        <label>Album Name</label>
        <input type="text" value="<?php echo $name ?>" name="name" class="form-control" required>
    </div>
    <?php }?>
    <div style="text-align: center" class="mt-3">
        <a href="admin_see_album.php" class="btn btn-danger">Cancel</a>
        <button type="submit" name="update_album" class="btn btn-primary">Update</button>
    </div>
    </form>
    </div>
    
    <?php } ?>
