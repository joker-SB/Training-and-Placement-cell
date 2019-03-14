<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Recruiter</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register Recruiter</h2>
  </div>
	
  <form method="post" action="addrecruiter.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
  	<div class="input-group">
  	  <label>email</label>
  	  <input type="email" name="email">
  	</div>
	<div class="input-group">
  	  <label>companyname</label>
  	  <input type="text" name="companyname">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_recruiter">Register</button>
  	</div>
  	
  </form>
</body>
</html>