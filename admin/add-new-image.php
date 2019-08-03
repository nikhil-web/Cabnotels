<?php
include('session.php');
$hotel_id = mysqli_real_escape_string($db,$_POST['hotel_id']);
$current_timestamp = time();
$target_dir = "hotel_image/";
$type=explode(".",$_FILES["fileToUpload"]["name"]);
$target_file = $target_dir.$current_timestamp.'_upload.'.end($type);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
  //  echo("<script>location.href = 'profile.php';</script>");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    alert("Sorry, your file was not uploaded.");
    // echo("<script>location.href = 'profile.php';</script>");
// if everything is ok, try to upload file
} else {
    if (
        
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        $file_name= $target_file;

        list($width, $height) = getimagesize($target_file);
        $newwidth = 700;
        $newheight = 500;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        
        
        // for jpg
        if($imageFileType == "jpg"){
            $source = imagecreatefromjpeg($target_file);
        }
        //for png
        if($imageFileType == "png"){
            $source = imagecreatefrompng($target_file);
        }
        
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        
        // Output
           // for jpg
        if($imageFileType == "jpg"){
            imagejpeg($thumb, $target_file);
        }
        //for png
        if($imageFileType == "png"){
            imagepng($thumb, $target_file);
        }

           $sql = "INSERT INTO hotel_images (id,hotel_image,hotel_id) VALUES (NULL,'$file_name','$hotel_id')";
           mysqli_query($db, $sql);
           navigate("hotels.php");

    } else {
         alert("Sorry, there was an error uploading your file.");
         navigate("menu.php");

    }
}

?>
