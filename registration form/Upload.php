<?php
    $image = "";
    if (isset($_FILES["image"]["name"])){
      $image = $_FILES["image"]["name"];
    }
    // Image upload
    $target_dir = "uploads/"; // Directory where the image will be stored
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
        exit();
      }
    }

    // Allow only certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $uploadOk = 0;
      exit();
    }

    // Upload the file
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
?>


<?php
/*
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
  exit();
}*/

// Check file size
/*
if ($image > 10000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
  exit();
}*/
?>