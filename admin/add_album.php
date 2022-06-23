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
        
           $insert = $con->query("INSERT INTO albums(name,images,created_at,updated_at) VALUES ('$name','$album',NOW(),NOW())");
           
           if($insert){
            $statusMsg = "The file".$album." has been uploaded successfully.";
            header("Location:admin.php");
           }else{
            $statusMsg = "File upload failed,please try again.";
           }
        }
           else{
           $statusMsg ="Sorry,there was an error uploading your file.";
         header("Location:admin.php");
       }
    }else{
        $statusMsg = "Sorry,only JPG,JPEG,PNG,GIF,&PDF files are allowed to upload.";
         header("Location:admin.php");
    }
}else{
        $statusMsg = "Please select a file to upload";
         header("Location:admin.php");
    }
}

?>
     
       
    