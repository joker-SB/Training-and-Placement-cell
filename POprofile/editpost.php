<?php 

$db = mysqli_connect('localhost', 'root', '', 'profile');

if(isset($_POST['editpost'])){ 
    $update_id=mysqli_real_escape_string($db, $_POST['update_id']); 
	$category = mysqli_real_escape_string($db, $_POST['category']);
	$title=mysqli_real_escape_string($db, $_POST['title']);
	$body=mysqli_real_escape_string($db, $_POST['body']);
	//$body =strip_tags($body);

	$sql="update post set category='$category',title='$title',body='$body' where id='$update_id'";
	$result= mysqli_query($db, $sql);

	if($result){
	header("Location:home.php");	
	}
	else{
		echo "Error: " . $sql . "<br>" . $db->error;
	}
		
}

        $id=$_GET['id'];
		$sql="select * from post where id='$id'";
		$result=$db->query($sql);
		$row=mysqli_fetch_assoc($result);
		
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
    <title>student- Home</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    
   
 
  <script src="http://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
  
  </head>
  <body>  
    <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
			<div class="container">
		
				<center><h1>Create Post</h1></center>
				<form method="post" action="editpost.php">
				    
					<div class="form-group">
						<label>Author</label>
						<input type="text" name="author" class="form-control" value="<?php echo($row['username'])?>" >
					</div>
					
				    <div class="form-group">
						   <label >Category</label>
							 <select name="category" class="form-control" value="<?php echo($row['category']);?>">
								<option  value="Tecnnology">Technology</option>
								<option  value="Pscycology">Pscycology</option>
								<option  value="Medical">Medical</option>
								<option  value="Social Issue">Social Issue</option>
								<option  value="cricket">cricket</option>
							</select>
					 </div>
					 
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" value="<?php echo($row['title']);?>">
					</div>
					
					<div class="form-group">
						<label>Body</label>
						<textarea  id="editor1" name="body" class="form-control"><?php echo($row['body']);?></textarea>
					</div>
					<input type="hidden" name="update_id" value="<?php echo ($row['id']); ?>">
					<input type="submit" name="editpost" value="Submit" class="btn btn-primary">
				</form>        
			</div>  
      </div>
		
    

	 
	 
     <!-- JS -->
	 <script>
          CKEDITOR.replace( 'editor1' );
        </script>

     <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
     <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
     <script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->

     <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>	 