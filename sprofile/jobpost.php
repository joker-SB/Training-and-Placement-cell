<?php
// students applying for the job
session_start();
$db = mysqli_connect('localhost', 'root', '', 'profile');
//Discard  the job to which logined  student has already applied
$username=$_SESSION['username'];
$sql="select * from jobpost where job_id not in (select job_id from job_apply where applicant_name ='$username')";
$result=$db->query($sql);
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count==0){
	header("Location:home.php");
}


if(isset($_GET['id'])){
	//echo("applied for the job");
    //header("Location:home.php");
	$username=$_SESSION['username'];
	$job_id=$_GET['id'];
	$sql="select * from jobpost where job_id='$job_id'";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_assoc($result);
	$companyname=$row['companyname'];
	echo($companyname);
	$applicant_applied=(int)$row['applicants_applied'] + 1;
	
	$sql="update jobpost set applicants_applied='$applicant_applied' where job_id='$job_id'";
	$result=mysqli_query($db,$sql);
	$sql="insert into job_apply(job_id,companyname,applicant_name) values('$job_id','$companyname','$username')";
	$result=mysqli_query($db,$sql);
	if($result){
	header("Location:home.php");	
	}
	else{
		die();
	}
	
	
	
	
	
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
    <title>Job apply</title>
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
							  <h3><?php echo($row['companyname'])?></h3>
							  <p><?php echo($row['body']);?></p>
							<button name="apply" value="apply"><a href="jobpost.php?id=<?php echo($row['job_id']);?>">Apply</a></button>
						   <strong>Job Available:<?php echo($row['job_available']);?> ||</strong>
						   <strong>Applicants Applied:<?php echo($row['applicants_applied']);?></strong>
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