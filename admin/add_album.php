<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
<?php
include '../layouts/connect.php';
include '../layouts/app.php';
$statusMsg = '';

$targetDir ="../upload_album/";

if(isset($_POST["submit"])){
    if(!empty($_FILES["file"]["name"])){
   $album=basename($_FILES["file"]["name"]);
   $targetFilePath = $targetDir . $album;
   $fileType=pathinfo($targetFilePath,PATHINFO_EXTENSION);
   $allowTypes=array('jpg','png','jpeg','gif','pdf');
   $name = $_POST['name'];
   
  
   if(in_array($fileType,$allowTypes)){
       
       if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
        
           $insert = $con->query("INSERT INTO albums(name,image,created_at,updated_at) VALUES ('$name','$album',NOW(),NOW())");
           
           if($insert){
            $statusMsg = "The file".$album." has been uploaded successfully.";
            header("Location:add_album.php");
           }else{
            $statusMsg = "File upload failed,please try again.";
           }
        }
           else{
           $statusMsg ="Sorry,there was an error uploading your file.";
         header("Location:add_album.php");
       }
    }else{
        $statusMsg = "Sorry,only JPG,JPEG,PNG,GIF,&PDF files are allowed to upload.";
         header("Location:add_album.php");
    }
}else{
        $statusMsg = "Please select a file to upload";
         header("Location:add_album.php");
    }
}


?>

     <div class="container mt-5" style="width:500px">

     <form action="" method="post" enctype="multipart/form-data">
            <p class="form-control mt-2">Create New Album:</p>
            <input type="text" name="name" placeholder="Please enter name of Album" class="form-control">
            <input type="file" name="file" multiple="multiple" class="custom-file-input mt-2" style="width:80%">
           
            <input type="submit" class="button" value="Submit" name="submit">
        </form>
        <a href="admin_see_album.php"><div class="button_danger">Back</div></a>
        </div>
    </div>