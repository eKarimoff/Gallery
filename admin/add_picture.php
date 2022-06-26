<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
<?php
include '../layouts/connect.php';
include '../layouts/app.php';
$statusMsg = '';

$targetDir ="../upload_picture/";

if(isset($_POST["submit"])){
    $fileNames = array_filter($_FILES['file']['name']);
    if(!empty($fileNames)){
        foreach($fileNames as $key=>$value){

   $fileName=basename($_FILES["file"]["name"][$key]);
   $targetFilePath = $targetDir . $fileName;
   $fileType=pathinfo($targetFilePath,PATHINFO_EXTENSION);
   $allowTypes=array('jpg','png','jpeg','gif','pdf');
   $album_id = $_POST["album_id"];
  
   if(in_array($fileType,$allowTypes)){
       
       if(move_uploaded_file($_FILES["file"]["tmp_name"][$key],$targetFilePath)){
        
           $insert = $con->query("INSERT INTO pictures(image,album_id) VALUES ('$fileName','$album_id')");
           
           if($insert){
            $statusMsg = "The file".$fileName." has been uploaded successfully.";
            header("Location:add_picture.php");
           }else{
            $statusMsg = "File upload failed,please try again.";
           }
        }
           else{
           $statusMsg ="Sorry,there was an error uploading your file.";
           header("Location:add_picture.php");
       }
    }else{
        $statusMsg = "Sorry,only JPG,JPEG,PNG,GIF,&PDF files are allowed to upload.";
        header("Location:add_picture.php");
    }
}
    }
}


    ?>
    <div class="container mt-5" style="width:500px">

    <div class="flex" style="justify-content:space-between;">

   
    <!-- <form action="add_album.php" method="post" enctype="multipart/form-data">
            <p class="form-control mt-2">Create New Album:</p>
            <input type="text" name="name" placeholder="Please enter name of Album" class="form-control">
            <input type="file" name="file" multiple="multiple" class="custom-file-input mt-2" style="width:80%">
           
            <input type="submit" class="button" value="Send" name="submit">
        </form> -->
    
        <!-- Add Picture Form -->
      
    <form action="" method="post" enctype="multipart/form-data">
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
        <input type="submit" class="button" value="Send" name="submit">
    </form>
    </div>
    </div>
       
   