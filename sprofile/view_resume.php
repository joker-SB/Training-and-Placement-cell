<?php 
session_start();
require("../config/connection.php");
$username=$_SESSION['username'];
$sql="select resume from userprofile where username='$username'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);


?>


<!DOCTYPE html>
<html>
<body>
<embed src="upload_resume/<?php echo($row['resume']);?>" type="application/pdf"   height="700px" width="100%">
</body>
</html>