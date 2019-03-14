<?php 
 $db = mysqli_connect('localhost', 'root', '', 'profile');
 
if (isset($_GET['student_id'])) {
	$id=$_GET['student_id'];
	$sql="delete from register where id='$id'";
	$result=mysqli_query($db,$sql);
	if($result){
	   header("Location:home.php");
	}
}
  
  
if (isset($_GET['tpo_id'])) {
	$id=$_GET['tpo_id'];
	$sql="delete from poregister where id='$id'";
	$result=mysqli_query($db,$sql);
	if($result){
	   header("Location:home.php");
	}
}

if (isset($_GET['recruiter_id'])) {
	$id=$_GET['recruiter_id'];
	$sql="delete from recruiter where id='$id'";
	$result=mysqli_query($db,$sql);
	if($result){
	   header("Location:home.php");
	}
}

if (isset($_GET['post_id'])) {
	$id=$_GET['post_id'];
	$sql="delete from post where id='$id'";
	$result=mysqli_query($db,$sql);
	if($result){
	   header("Location:home.php");
	}
}
?>