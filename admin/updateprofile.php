<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Profile</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Update Profile</h2>
  </div>
	
  <form method="post" action="updateprofile.php" enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo ($_SESSION['username']); ?>">
  	</div>
  	
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo($email);?>">
  	</div>
	<div class="input-group">
  	  <label>Select an image</label>
  	  <input type="file" name="fileToUpload" id="fileToUpload">
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
  	  <button type="submit" class="btn" name="updateprofile">update</button>
  	</div>
  	
  </form>
</body>
</html>