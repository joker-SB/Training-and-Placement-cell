<?php
$db = mysqli_connect('localhost', 'root', '', 'profile');
$errors = array(); 
if (isset($_GET['tpopassword_id'])) {
	$id=$_GET['tpopassword_id'];
}
if(isset($_POST['changepassword'])){
 // receive all input values from the form
    $update_id=mysqli_real_escape_string($db, $_POST['update_id']);
    $username=mysqli_real_escape_string($db, $_POST['username']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
	  if(empty($username)) { array_push($errors, "username is required"); }
	  if(empty($password_1)) { array_push($errors, "Password is required"); }
	  
      if($password_1 != $password_2) {
	  array_push($errors, "The two passwords do not match");
      }
	
	if (count($errors) == 0){
		$password = md5($password_1);//encrypt the password before saving in the database
		$sql = "update poregister set password='$password' where username='$username' and id='$update_id'";
		$result=$db->query($sql);  

		if ($result === TRUE){ 
			//echo "New record created successfully";
		    header("Location:home.php");
		}
		else{
			array_push($errors, "some error occured");
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Change Password</h2>
  </div>
	
  <form method="post" action="changeTPOpassword.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
  	
  	<div class="input-group">
  	  <label>New Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm New password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
	 <?php if(isset($_GET['tpopassword_id'])):?>
	<input type="hidden" name="update_id" value="<?php echo($id);?>">
	<?php endif;?>
  	  <button type="submit" class="btn" name="changepassword">Update</button>
  	</div>
  	
  </form>
</body>
</html>