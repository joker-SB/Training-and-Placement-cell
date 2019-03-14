
<?php
 session_start(); 
 
 $db = mysqli_connect('localhost', 'root', '', 'profile');
 
 if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
	unset($_SESSION['image']);
	
	unset($_SESSION['email']);
  	header("location: login.php");
  }
  
  
  
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  
   
  
    if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  
  
  
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Admin- Home</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    
   

  </head>
  <body>  
    <!-- Left column -->
    <div class="templatemo-flex-row">
			  <div class="templatemo-sidebar">
				<header class="templatemo-site-header">
				  <div class="square"></div>
				   <?php
				  $Welcome = "Welcome";
				  echo "<h1>" . $Welcome . "<br>". $_SESSION['username']. "</h1>";
				  ?>
				</header>
				<div class="profile-photo-container">
				  <img src="images/<?php echo($_SESSION['image']);?>" alt="Profile Photo" class="img-responsive">  
				  <div class="profile-photo-overlay"></div>
				</div>      
				<!-- intro-->
				
				
				<div class="mobile-menu-icon">
					<i class="fa fa-bars"></i>
				</div>
				<nav class="templatemo-left-nav">          
				  <ul>
				  
					
					<li><a>
					 <?php if(isset($_SESSION['email'])):?>
							<h3>email:</h3>
						  
							 <strong><?php echo($_SESSION['email']);?></strong> 
						  
					 <?php endif ?>
					</a></li>
					
					<li><a href="updateprofile.php">update profile</a></li>
				    
					   
					
				  </ul>  
				</nav>
			  </div>
			  <!-- Main content --> 
			  <div class="templatemo-content col-1 light-gray-bg">
						<div class="templatemo-top-nav-container">
						  <div class="row">
							<nav class="templatemo-top-nav col-lg-12 col-md-12">
							  <ul class="text-uppercase">
								<li>
								  <a href="../index.php">Home Page</a>
								</li>
								
								
								<li>
								  <a href="addtpo.php">Add TPO</a>
								  </li>
								<li>
								  <a href="home.php?logout='1'" style="color: red;">logout</a>
								 </li>
								  
							  </ul>  
							</nav> 
						  </div>
						</div>
						
						
<?php

$db=mysqli_connect('localhost','root','','profile');
$sql="select * from register";
$results=mysqli_query($db,$sql);
$rows=mysqli_fetch_all($results,MYSQLI_ASSOC);
?>
						<br><br>
                     <!-- article section              -->
					 <div class="container">
					      <h2><center>Registered Students</center></h2>
						  <table class="table table-hover table-bordered table-sm">
							<thead>
							  <tr>
								<th>username</th>
								<th>email</th>
								<th>operation1</th>
								<th>operation2</th>
							  </tr>
							</thead>
							<tbody>
							<?php foreach($rows as $row):?>
							  <tr>
								<td><?php echo($row['username']);?></td>
								<td><?php echo($row['email']);?></td>
								<td><a href="delete.php?student_id=<?php echo($row['id']);?>" >delete</a></td>
								<td><a href="changeStpassword.php?studentpassword_id=<?php echo($row['id']);?>" >Change Password</a></td>
							  </tr>
							 <?php endforeach;?>
							</tbody>
						  </table>					 
					</div>
					
<?php
$db=mysqli_connect('localhost','root','','profile');
$sql="select * from poregister";
$results=mysqli_query($db,$sql);
$rows=mysqli_fetch_all($results,MYSQLI_ASSOC);
?>
						<br><br>
                     <!-- article section              -->
					 <div class="container">
					      <h2><center>Registered TPOS</center></h2>
						  <table class="table table-hover table-bordered table-sm">
							<thead>
							  <tr>
								<th>username</th>
								<th>email</th>
								<th>operation1</th>
								<th>operation2</th>
							  </tr>
							</thead>
							<tbody>
							<?php foreach($rows as $row):?>
							  <tr>
								<td><?php echo($row['username']);?></td>
								<td><?php echo($row['email']);?></td>
								<td><a href="delete.php?tpo_id=<?php echo($row['id']);?>" >delete</a></td>
								<td><a href="changeTPOpassword.php?tpopassword_id=<?php echo($row['id']);?>" >Change Password</a></td>
							  </tr>
							 <?php endforeach;?>
							</tbody>
						  </table>					 
					</div>	
					
<?php
$db=mysqli_connect('localhost','root','','profile');
$sql="select * from recruiter";
$results=mysqli_query($db,$sql);
$rows=mysqli_fetch_all($results,MYSQLI_ASSOC);
?>
						<br><br>
                     <!-- article section              -->
					 <div class="container">
					      <h2><center>Registered Recruiters</center></h2>
						  <table class="table table-hover table-bordered table-sm">
							<thead>
							  <tr>
								<th>username</th>
								<th>email</th>
								<th>company</th>
								<th>operation1</th>
								<th>operation2</th>
							  </tr>
							</thead>
							<tbody>
							<?php foreach($rows as $row):?>
							  <tr>
								<td><?php echo($row['username']);?></td>
								<td><?php echo($row['email']);?></td>
								<td><?php echo($row['companyname']);?></td>
								<td><a href="delete.php?recruiter_id=<?php echo($row['id']);?>" >delete</a></td>
								<td><a href="changeRtpassword.php?recruiterpassword_id=<?php echo($row['id']);?>" >Change Password</a></td>
							  </tr>
							 <?php endforeach;?>
							</tbody>
						  </table>					 
					</div>
				

<?php
$db=mysqli_connect('localhost','root','','profile');
$sql="select * from post";
$results=mysqli_query($db,$sql);
$rows=mysqli_fetch_all($results,MYSQLI_ASSOC);
?>
						<br><br>
                     <!-- article section              -->
					 <div class="container">
					      <h2><center>students Post</center></h2>
						  <table class="table table-hover table-bordered table-sm">
							<thead>
							  <tr>
								<th>username</th>
								<th>Title</th>
								
								<th>operation</th>
								
							  </tr>
							</thead>
							<tbody>
							<?php foreach($rows as $row):?>
							  <tr>
								<td><?php echo($row['username']);?></td>
								<td><?php echo($row['title']);?></td>
								
								<td><a href="delete.php?post_id=<?php echo($row['id']);?>" >delete</a></td>
								
							  </tr>
							 <?php endforeach;?>
							</tbody>
						  </table>					 
					</div>				

			    </div>
           
  

            
        </div>
	  <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->

    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>