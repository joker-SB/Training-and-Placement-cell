<?php
//applicant profile 
$db = mysqli_connect('localhost', 'root', '', 'profile');

if(isset($_GET['applicant_name'])){
	$applicant_name=$_GET['applicant_name'];
	$sql="select * from userprofile where username='$applicant_name'";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_assoc($result);
	$sql2="select email from register where username='$applicant_name'";
	$result2=mysqli_query($db,$sql2);
	$row2=mysqli_fetch_assoc($result2);
	
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
    <title>Applicant Profile</title>
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
 
  <!-- Main content --> 
<div class="templatemo-content col-1 light-gray-bg">
	 <div class="templatemo-content-widget white-bg col-1">
			<div class="container">
			  <h2><center>Applicants Details</center></h2>
			  
				
				
					
						   
							<p><strong>Applicant_username: </strong><?php echo($row['username']);?></p>
							<p><strong>Email Id: </strong><?php echo($row2['email']);?></p>
							<p><strong>Introduction: </strong><?php echo($row['intro']);?></p>
							<p><strong>Skills: </strong><?php echo($row['skills']);?></p>
							<strong>Resume: </strong>
							<embed src="../sprofile/upload_resume/<?php echo($row['resume']);?>" type="application/pdf"   height="700px" width="100%">
							<p></p>
						   
						
						  
					 
				
			  					 
			</div>	
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