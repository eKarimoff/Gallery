<title>Admin Panel</title>
<?php
include '../layouts/connect.php';
include '../layouts/app.php';

?>
 
    <h3 style="text-align: center">Admin Panel</h3>
    <div class="container">

        <div style="text-align: center" class="mt-5">
            <a class="btn btn-success " href="../user/album.php">Albums</a>
        </div>
        <!-- Add Album Form -->
        <div class="row">
        <?php if(!empty($statusMsg)){ ?>
      <div class="alert alert-success" role="alert"><?php echo $statusMsg; ?></div>
        <?php } ?>
      <div class="col-md-6">

        <form action="add_album.php" method="post" enctype="multipart/form-data">
            <p class="form-control mt-2">Create New Album:</p>
            <input type="text" name="name" placeholder="Please enter name of Album" class="form-control">
            <input type="file" name="file" multiple="multiple" class="custom-file-input mt-2" style="width:80%">
           
            <input type="submit" class="btn btn-primary form-control mt-2" value="Send" name="submit">
        </form>
      </div>
        <!-- Add Picture Form -->
        <div class="col-md-6">
    <form action="add_picture.php" method="post" enctype="multipart/form-data">
        <p class="form-control mt-2">Select image to upload:</p>
        <select name="album_id" class="form-control mt-2">
            <option value="" class="form-control">Select a album</option>
            <?php
           $sql= "SELECT * FROM albums";
           $result=mysqli_query($con,$sql);
           while($row=mysqli_fetch_assoc($result)){
               ?>
            <option value="<?php echo  $row['id']?>"><?php echo $row['name']?></option>
            <?php }   ?>
        </select>
        <input type="file" name="file[]" multiple class="custom-file-input mt-2 mb-2" style="width:80%">
        <input type="submit" class="btn btn-primary form-control" value="Send" name="submit">
    </form>
    </div>
    </div>

