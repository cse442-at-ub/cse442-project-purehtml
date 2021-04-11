<?php
// Start the session
session_start();
?>

<?php
$target_dir = "../data/profile_pics/";
$target_file = $target_dir . $_SESSION['username'] . ".png";
$check_name = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($check_name,PATHINFO_EXTENSION));

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "<script>alert('Only JPG, JPEG, PNG files are allowed');</script>";
  echo "<script>location.href = '../editpp.php'</script>";
  exit();
}

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    //echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "<script>alert('Filesize is too large!');</script>";
  echo "<script>location.href = '../editpp.php'</script>";
  exit();
}

else{
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}

?>
<?php
echo "<script>alert('Profile Picture changed successfully!');</script>";
echo "<script>location.href = '../userpage.php'</script>";
?>