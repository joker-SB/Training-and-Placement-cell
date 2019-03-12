<?php 
$db=mysqli_connect('localhost','root','','profile');
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
		<title>Job Post</title>
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
						
<?php 
if(isset($_POST['submit'])){
	$search=$_POST['search'];
	$sql="select * from jobpost where body like '%$search%'";
	$result=mysqli_query($db,$sql);
	
	$count=mysqli_num_rows($result);
	
    
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
	
}

?>						
						 <?php foreach($rows as $row):?> 
						   <div class="templatemo-content-widget white-bg col-1">
								
							  <h2><?php echo($row['title']);?></h2>
							  <h3><?php echo($row['companyname'])?></h3>
							  <p><?php echo($row['body']);?></p>
							  <button name="applyjob" value="applyjob"><a href="applyjob.php?id=<?php echo($row['id']);?>">Apply</a></button>
						   </div>
					    <?php endforeach;?>
						
						
						
<?php 
    if(isset($_POST['submit'])){
	$search=$_POST['search'];
	$sql="select * from post where body like '%$search%'";
	$result=mysqli_query($db,$sql);
	
	$count=mysqli_num_rows($result);
	if($count==0){
		die("No Result found");
	}
    else{
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
	}

	}
?>						
						 <?php foreach($rows as $row):?> 
						   <div class="templatemo-content-widget white-bg col-1">
								
							  <h2><?php echo($row['title']);?></h2>
							  <h3><?php echo($row['category'])?></h3>
							  <p><?php echo($row['body']);?></p>
							  <button name="applyjob" value="applyjob"><a href="applyjob.php?id=<?php echo($row['id']);?>">Apply</a></button>
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