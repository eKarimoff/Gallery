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
      

     
   

