<?php
session_start();

// Check if user is logged in
if (!$_SESSION['logged_in']) {
    header('Location: /');
    exit;
}


if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0){
  #$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
  $filename = $_FILES["fileToUpload"]["name"];
  $filetype = $_FILES["fileToUpload"]["type"];
  $filesize = $_FILES["fileToUpload"]["size"];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  #if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
  $maxsize = 5 * 1024 * 1024;
  if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "upload/" . $filename)){
        echo "Your application ". $filename . " has been uploaded in /upload. Lechuck will review it when he finds the secret.\n";
        echo "Click <a href=\"home.php\"> here</a> for return";

    } else{
        echo "Error: There was an error uploading your file. Please try again.";
    }
} else{
    echo "Error: " . $_FILES["fileToUpload"]["error"];
}
