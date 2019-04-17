<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'profile');
if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
	$sql="select * from post where username='$username'";
	$result=$db->query($sql);
	$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
	
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
    <title>Recent Post</title>
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