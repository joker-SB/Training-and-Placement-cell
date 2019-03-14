<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'profile');


// ... 
// LOGIN USER
if (isset($_POST['login_recruiter'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM recruiter WHERE username='$username' AND password='$password'";
	
  	$results = mysqli_query($db, $query);
	
	
  	if (mysqli_num_rows($results) == 1) {
	  
  	  $_SESSION['username'] = $username;
	  

  	  $_SESSION['success'] = "You are now logged in";
	  header('location: home.php');
	}
	
	else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//...
//recruiter profile

if(isset($_POST['uploadprofile'])){
  // receive all input values from the form
    $username = mysqli_real_escape_string($db,$_POST['username']);
	$companyname = mysqli_real_escape_string($db,$_POST['companyname']);
	$contactnumber = mysqli_real_escape_string($db,$_POST['contactnumber']);
	$image=basename($_FILES["fileToUpload"]["name"]);
	
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
	  if (empty($username)) { array_push($errors, "Username is required"); }
	  if (empty($companyname)) { array_push($errors, "company name is required"); }
	  if (empty($contactnumber)) { array_push($errors, "contact number is required"); }
	  if (empty($image)) { array_push($errors, "image is required"); }
  
  //first check whether  the user is registered 	
	$sql="select username from recruiter where username='$username' LIMIT 1"; 	
	$result=$db->query($sql);     
	$rowcount=mysqli_num_rows($result);  
	if($rowcount==0){
		array_push($errors, "user does not exist,please register yourself");
	
    }
	
  // check whether userprofile already exists	
	$sql2="select username from recruiterprofile where username='$username' LIMIT 1";
	$result2=$db->query($sql2);
	$rowcount2=mysqli_num_rows($result2);
	if($rowcount2>0){
		array_push($errors, "user  profile already exists");
	}
	
	
  // if all set means no error then insert data into database 

  // inserting image first 	
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
	else {
        //echo "File is not an image.";
        $uploadOk = 0;
		array_push($errors, "File is not an image.");
	}

  // Check if file already exists
	if (file_exists($target_file)) {
		//echo "Sorry, file already exists.";
		$uploadOk = 0;
		array_push($errors, "Sorry, file already exists.");
	}
	
  // Check file size
	if ($_FILES["fileToUpload"]["size"] > 100000) {  //image size should be < 100KB
		//echo "Sorry, your file is too large.";
		$uploadOk = 0;
		array_push($errors, "Sorry, your file is too large.");
	}

  // Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
		array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
	
// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
		array_push($errors, "Sorry, your file was not uploaded.");
	}
	
// if everything is ok, try to upload file
   if (count($errors) == 0){
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} 
		else {
			array_push($errors, "Sorry, there was an error uploading your file.");
		}
    }

	
   // inserting other in table 	
	if (count($errors) == 0){
		$sql = "INSERT INTO recruiterprofile (username,companyname,contactnumber,image)VALUES ('$username','$companyname','$contactnumber','$image')";
		$result=$db->query($sql);  

		if ($result === TRUE){ 
			//echo "New record created successfully";
		    header("Location:login.php");
		}
		else{
			array_push($errors, "some error occured");
		}
	}
	
}


//...
//CREATE A POST  for job
	if(isset($_POST['createpost'])){
		$username=$_SESSION['username'];	
		$companyname = mysqli_real_escape_string($db, $_POST['companyname']);
		$title=mysqli_real_escape_string($db, $_POST['title']);
		$body=mysqli_real_escape_string($db, $_POST['body']);
		//$body =strip_tags($body);

		$sql="insert into jobpost(username,companyname,title,body) values('$username','$companyname','$title','$body')";
		$result=mysqli_query($db, $sql);
		
		if($result){
		header("Location:home.php");	
		}
		else{
			echo "Error: " . $sql . "<br>" . $db->error;
		}
	}

	
//...
//change password	
if (isset($_POST['changepassword'])) {
  // receive all input values from the form
  $username = $_SESSION['username'];
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  

  // change password
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query ="update recruiter set password='$password' where username='$username'"; 
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}

//...
//change profile pic
if(isset($_POST['changeprofilepic'])){
  // receive all input values from the form
    $username = $_SESSION['username'];
	$image=basename($_FILES["fileToUpload"]["name"]);
	
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
	
	  if (empty($image)) { array_push($errors, "image is required"); }
  

  // upload image  	
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
	else {
        //echo "File is not an image.";
        $uploadOk = 0;
		array_push($errors, "File is not an image.");
	}

  // Check if file already exists
	if (file_exists($target_file)) {
		//echo "Sorry, file already exists.";
		$uploadOk = 0;
		array_push($errors, "Sorry, file already exists.");
	}
	
  // Check file size
	if ($_FILES["fileToUpload"]["size"] > 100000) {  //image size should be < 100KB
		//echo "Sorry, your file is too large.";
		$uploadOk = 0;
		array_push($errors, "Sorry, your file is too large.");
	}

  // Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
		array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
	
// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
		array_push($errors, "Sorry, your file was not uploaded.");
	}
	
// if everything is ok, try to upload file
   if (count($errors) == 0){
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} 
		else {
			array_push($errors, "Sorry, there was an error uploading your file.");
		}
    }

	
   // inserting other in table 	
	if (count($errors) == 0){
		$sql = "update recruiterprofile set image='$image' where username='$username'";
		$result=$db->query($sql);  

		if ($result === TRUE){ 
			//echo "New record created successfully";
		    header("Location:login.php");
		}
		else{
			array_push($errors, "some error occured");
		}
	}
	
}
	
?>