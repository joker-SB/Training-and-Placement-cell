
<?php
 session_start(); 
 
 $db = mysqli_connect('localhost', 'root', '', 'profile');
 
 if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
	header("location: login.php");
  }
 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  
  if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
	$sql="select * from recruiterprofile where username='$username'";
	$result=$db->query($sql);
	$row=mysqli_fetch_assoc($result);
	 $sql2="select * from jobpost where username='$username'";
	 $result2=$db->query($sql2);
	 $rows=mysqli_fetch_all($result2,MYSQLI_ASSOC);
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
    <title>Recruiter Home</title>
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
				  <img src="images/<?php echo($row['image']);?>" alt="Profile Photo" class="img-responsive">  
				  <div class="profile-photo-overlay"></div>
				</div>      
				<!-- intro-->
				
				
				<div class="mobile-menu-icon">
					<i class="fa fa-bars"></i>
				</div>
				<nav class="templatemo-left-nav">          
				  <ul>
				  
					<li><a><h3>Company:</h3><strong><?php echo($row['companyname']);?></strong></a></li>
					<li><a><h3>Contact:</h3><strong><?php echo($row['contactnumber']);?></strong></a></li>
					
					
					<li><a href="#">update profile</a></li>
						<li><a href="changeprofilepic.php">change profilePic</a></li>
					   
					
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
								  <a href="jobpost.php">Create Post</a>
								</li>
								 <li>
								  <a href="changepassword.php">Change Password </a>
								  </li>
								<li>
								  <a href="home.php?logout='1'" style="color: red;">logout</a>
								 </li>
								  
							  </ul>  
							</nav> 
						  </div>
						</div>
						
			          <?php foreach($rows as $row):?> 
						   <div class="templatemo-content-widget white-bg col-1">
								
							  <h2><?php echo($row['title']);?></h2>
							  <p><?php echo($row['body']);?></p>
							  <button name="readmore" value="Read More"><a href="readmorepost.php?id=<?php echo($row['id']);?>">Read more</a></button>
						   </div>
					    <?php endforeach;?>
					  
	            </div>
      
        </div>
	  <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->

    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>