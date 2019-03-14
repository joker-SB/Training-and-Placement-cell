<?php 

$db = mysqli_connect('localhost', 'root', '', 'profile');
if(isset($_GET['id'])){
	
	$id=$_GET['id'];
	$sql="select * from post where id='$id'";
	$result=$db->query($sql);
	$row=mysqli_fetch_assoc($result);
}

?>

<div class="templatemo-content-widget white-bg col-1">

<h2><?php echo($row['title']);?></h2>
<p><?php echo($row['body']);?></p>

</div>

 <button name="edit" value="edit post"><a href="editpost.php?id=<?php echo($row['id']);?>">Edit Post</a></button>
 <button name="deletepost" value="delete post"><a href="deletepost.php?id=<?php echo($row['id']);?>">Delete Post</a></button>
 