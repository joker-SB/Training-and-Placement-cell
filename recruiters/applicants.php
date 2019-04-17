<?php
//recruiter wiil see the applicants of the job 
$db = mysqli_connect('localhost', 'root', '', 'profile');

if(isset($_GET['id'])){
	$job_id=$_GET['id'];
	$sql="select * from job_apply where job_id='$job_id'";
	$result=mysqli_query($db,$sql);
	$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
	
}

if(isset($_POST['submit'])){
	//echo("hello");
	$job_id=$_POST['job_id'];
	$applicant_name=$_POST['applicant_name'];
	$status=$_POST['status'];
	//echo($status);
	$sql="update job_apply set status='$status' where applicant_name='$applicant_name' and job_id='$job_id'";
	$result=mysqli_query($db,$sql);
	header("Location:home.php");
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
    <title>Applicants for the job</title>
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
			  <h2><center>Job Applied</center></h2>
			  <table class="table table-hover table-bordered table-sm">
				<thead>
				  <tr>
					<th>username</th>
					<th>status</th>
					<th>Applied_at</th>
					<th>View Applicant</th>
					<th>Add Status</th>
					
				  </tr>
				</thead>
				<tbody>
					<?php foreach($rows as $row):?>
						   <tr>
							<td><?php echo($row['applicant_name']);?></td>
							<td><?php echo($row['status']);?></td>
							<td><?php echo($row['applied_on']);?></td>
							<td><button name="view_applicants"><a href="viewapplicant.php?applicant_name=<?php echo($row['applicant_name']);?>">View Profile</a></button></td>
							  <td>
								  <form method="post" action="applicants.php">
								    <input type="hidden" name="applicant_name" value="<?php echo($row['applicant_name']);?>">
									<input type="hidden" name="job_id" value="<?php echo($row['job_id']);?>">
									<select type="text" name="status">
									  <option value="seen">seen</option>
									  <option value="in-touch">in-touch</option>
									  <option value="selected">selected</option>
									  <option value="rejected">rejected</option>
									</select>
								     <button type="submit" name="submit">Submit</button>
								   </form>
							   </td>
						   </tr>
						
						  
					 <?php endforeach;?>
				</tbody>
			  </table>					 
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