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
}
    }
}


    ?>
    
   
       
   