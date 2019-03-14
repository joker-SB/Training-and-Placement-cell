<?php 
$db = mysqli_connect('localhost', 'root', '', 'profile');
if(isset($_GET['id'])){
	
	$id=$_GET['id'];
	$sql="delete from  post where id='$id'";
	$result=$db->query($sql);
	if($result){
	
		header("Location:home.php");
	}
}

?>


 