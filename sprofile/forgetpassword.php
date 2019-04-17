<?php
 session_start();
 $db = mysqli_connect('localhost', 'root', '', 'profile');
$errors=array();

$otp='';

if(isset($_POST['sendotp'])){
	require_once('PHPMailer/PHPMailerAutoload.php');

    $username=$_POST['username'];
	$_SESSION['username']=$username;
	$email=$_POST['email'];
	$otp=mt_rand(10,100);
	$_SESSION['otp']=$otp;
	$msg="";
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
	
	$sql="select * from register where username='$username' and email='$email'";
	$result=mysqli_query($db,$sql);
	$rowcount=mysqli_num_rows($result);
	
	if($rowcount==0){
		array_push($errors,"Wrong email Id or username!");
	}
	
	if(count($errors)==0){
		$mail=new PHPMailer();
		//$mail->SMTPDebug = 1;
		$mail->isSMTP(true);
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='ssl';
		$mail->Host='smtp.gmail.com';
		$mail->Port='465';
		$mail->isHTML(true);
		$mail->Username='rajnishpatel8863939768@gmail.com';
		$mail->Password='mynameisladdu';
		//$mail->SetFrom('rajnishpatel8863939768@gmail.com');
		$mail->Subject='OTP';
		$mail->Body='Your OTP is :'.$otp;
		$mail->AddAddress($email);


		if($mail->send())
			echo("please check your mail");
			  
		else
			 array_push($errors,"Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
	}

}

if(isset($_POST['verifyotp'])){
	$otp=$_POST['otp'];
	//echo($_SESSION['otp']);
	if($otp==$_SESSION['otp']){
		//session_destroy();
		unset($_SESSION['otp']);
		//unset($_SESSION['username']);
		header("Location:changepassword.php");
	}
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Forget Password</h2>
  </div>
	 
  <form method="post" action="forgetpassword.php">
  	<?php include('errors.php'); ?>
	<?php if(isset($_POST['submit'])):?>
	<h2><?php echo($msg);?></h2>
	<?php endif;?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Email</label>
  		<input type="email" name="email">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="sendotp">Send OTP</button>
  	</div>
  	
  </form>
  
  <form method="post" action="forgetpassword.php">
  	
  	<div class="input-group">
  		<label>OTP</label>
  		<input type="text" name="otp" required >
  	</div>
  	
  	<div class="input-group">
  		<button type="submit" class="btn" name="verifyotp">Verify OTP</button>
  	</div>
  	
  </form>
</body>
</html>