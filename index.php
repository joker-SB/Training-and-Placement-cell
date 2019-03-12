<?php

$db=mysqli_connect('localhost','root','','profile');
$sql="select distinct(companyname) from recruiter";
$result=mysqli_query($db,$sql);
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
        <title>TPO CELL </title>
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <!-- Footer -->
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
        <!-- Plugin CSS -->
        <link rel="stylesheet" href="css/animate.min.css" type="text/css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/creative.css" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    
    <body id="page-top">
        
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top" style="background:black">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="https://www.iiitnr.ac.in/">International Institute of Information Technology</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                       
					   <li><a href="jobpost.php">JOB Post</a>  </li>
					 	<li><a href="tpopost.php">TPO Post</a>  </li>				
                        <li>
                            <a class="page-scroll" href="sprofile/login.php">Student Login</a>
                        </li>
                        
                        <li>
                            <a class="page-scroll" href="POprofile/login.php">Placement Login</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="admin/login.php">Administrative Login</a>
                        </li>
						
						<li>
						   <form method="post" action="search.php">
                            <input type="text" name="search" placeholder="search" required>
                            <button  name="submit" value="submit">submit</button>							
						   </form>
						</li>
                    </ul>
                
            </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <header>
            <div class="header-content">
                <div class="header-content-inner">
                    <h1>PLACEMENT MANAGEMENT SYSTEM</h1>
                    <hr>
                    <p>We are here to Build your Skills and Career with our Driven Passion and Reality.</br>Click Below to Get Our Current Drive
                        Details</p>
                   
                </div>
            </div>
        </header>
        <div class="footer">
			<div class="container">
				<div class="col-md-3 ftr_navi ftr">
					<h3>NAVIGATION</h3>
					<ul>
						
						<li>
							<a href="recruiter/login.php">Recruiter Login</a>
						</li>
						<li>
							<a href="studentpost.php">Student Post</a>
						</li>
						
						<li>
							<a href="admin/login.php">Administrative Login</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 ftr_navi ftr">
					<h3>MEMBERS</h3>
					<ul>
						<li>
							<a href="#">Customer Support</a>
						</li>
						<li>
							<a href="#">Placement Support</a>
						</li>
						<li>
							<a href="#">Faculty Support</a>
						</li>
						<li>
						<button type="button"  data-toggle="modal" data-target="#myModal">Registered Companies</button>
							
						</li>
						<li>
							<a href="#">Training</a>
						</li>
					</ul>
				</div>
				
				
				<div class="clearfix"></div>
			</div>
		</div>
		
		<!-- div for modal section -->
		
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-sm">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Registered Companies</h4>
				  </div>
				  <div class="modal-body">
					<?php foreach($rows as $row):?>
					<strong><?php echo($row['companyname']);?></strong><br>
					<?php endforeach;?>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
		<!-- Modal -->
    </body>

</html>
