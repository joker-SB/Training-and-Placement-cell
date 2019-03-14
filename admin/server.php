<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'profile');


// ... 
// LOGIN Admin
if (isset($_POST['login_admin'])) {
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
  	$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	
	
	$email=$row['email'];
	$image=$row['image'];
	
  	if (mysqli_num_rows($result) == 1) {
	  
  	  $_SESSION['username'] = $username;
	  $_SESSION['image']=$image;
	  $_SESSION['email']=$email;
	  
  	  $_SESSION['success'] = "You are now logged in";
	  header('location: home.php');
	}
	
	else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}



//...
//update admin profile 

if(isset($_POST['updateprofile'])){
  // receive all input values from the form
    $username = $_SESSION['username'];
	$email=mysqli_real_escape_string($db, $_POST['email']);
	$image=basename($_FILES["fileToUpload"]["name"]);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
	  if(empty($email)) { array_push($errors, "email is required"); }
	  if (empty($image)) { array_push($errors, "image is required"); }
      if(empty($password_1)) { array_push($errors, "Password is required"); }
      if($password_1 != $password_2) {
	  array_push($errors, "The two passwords do not match");
      }

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
		$password = md5($password_1);//encrypt the password before saving in the database
		$sql = "update admin set email='$email',image='$image',password='$password' where username='$username'";
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
//Add TPO
if (isset($_POST['reg_tpo'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email= mysqli_real_escape_string($db, $_POST['email']);
 
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "email is required"); }
 
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM poregister WHERE username='$username' or email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
    
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO poregister (username,email,password) VALUES('$username','$email','$password')";
  	mysqli_query($db, $query);
  	header('location: home.php');
  }
}	
