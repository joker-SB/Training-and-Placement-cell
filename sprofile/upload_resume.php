<?php 
session_start();
require("../config/connection.php");
$errors=array();
if(isset($_POST['upload_resume'])){
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$target_dir = "upload_resume/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $resume=basename($_FILES["fileToUpload"]["name"]);

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 1000000) {  //1MB
		array_push($errors, "Sorry, your file is too large.");
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "pdf") {
		array_push($errors, "Sorry, only pdf files are allowed.");
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		array_push($errors, "Sorry, your file was not uploaded.");
	// if everything is ok, try to upload file
	} 
	
	if(count($errors)==0) {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			array_push($errors, "Sorry, there was an error uploading your file.");
		}
	    $sql="update userprofile set resume='$resume' where username='$username'";
		$result=mysqli_query($db,$sql);
		header("Location:home.php");
	}
}




?>




<!DOCTYPE html>
<html>
<head>
  <title> Resume</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>upload Resume</h2>
  </div>
	
  <form method="post" action="upload_resume.php" enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username :  <strong><?php echo($_SESSION['username']);?></strong></label>
	 
  	  <input type="hidden" name="username" value="<?php echo($_SESSION['username']);?>">
  	</div>
  	
  	<div class="input-group">
  	  <strong>Select your resume(size must be less than 1MB)</strong>
	  <p>**use some online pdf resizer to reduce the size</p>
  	  <input type="file" name="fileToUpload" id="fileToUpload" required>
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="upload_resume">Upload</button>
  	</div>
  	
  </form>
</body>
</html>