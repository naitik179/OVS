<?php
session_start();
?>

 <?php

  $localhost = "localhost";
  $username = "root";
  $password = "";
  $db = "online_voting";
  

  $conn = mysqli_connect($localhost,$username,$password,$db);
  if(!$conn)
  echo "Connection error : " .mysqli_connect_error();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Linear by TEMPLATED</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</head>
	<body>

	<!-- Header -->
		<div id="header">
			<div id="nav-wrapper"> 
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="active"><a href="Login.php">Login</a></li>
					</ul>
				</nav>
			</div>
			<div class="container"> 
			</div>
		</div>
	<!-- Header --> 

	<!-- Main -->
		<div id="main">
			<div class="container">
				<div class="row">

					<!-- Content -->
					<div id="content" class="8u skel-cell-important">
						<section>
							<header>
								<h2>LOGIN</h2>
								<!-- <span class="byline">Integer sit amet pede vel arcu aliquet pretium</span> -->
							</header>

							<form name="form1" method="post">
								User id <br><br>
								<input type="text" name="uid"><br><br>
								Password<br><br>
								<input type="password" name="pass"><br><br>
								<input class="button button-style1" type="submit" name="submit"><br><br>
							</form>
						</section>
					</div>


					<?php
					    if (isset($_POST['submit'])) {
					    	$uid = $_POST['uid'];
					    	$pass = $_POST['pass'];

					    	$retrieving_data = "select username,email_id from user where username='".$uid."' AND password='".$pass."'";
					    	$result = $conn->query($retrieving_data);

					    	if ($result->num_rows > 0 && $result->num_rows < 2) {
					    	    while($row = $result->fetch_assoc()) {
					    	    $_SESSION['userid'] = $uid;
					    	    $_SESSION['email_id'] = $row['email_id'];
					    	    $_SESSION['type']= $row['user_type'];
					            // $_SESSION['start'] = time(); // Taking now logged in time.
					            // Ending a session in 30 minutes from the starting time.
					            // $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
					            header('Location: http://localhost:8000/OVS/voting/phpmailer/mailer.php');  
					    	    }

					    	} else { ?>

					    	    <p class="error">Please enter a valid username or password</p>

					    	<?php
					    	}
					            
					    }
					?>
				</div>
			</div>
		</div>
	<!-- /Main -->

	<!-- Footer -->
	<div id="footer">
		<div class="container">
			<section>
				<header>
					<h2>Get in touch</h2>
					<span class="byline">Contact US</span>
				</header>
				<ul class="contact">
					<li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
					<li class="active"><a href="#" class="fa fa-facebook"><span>Facebook</span></a></li>
					<li><a href="#" class="fa fa-dribbble"><span>Pinterest</span></a></li>
					<li><a href="#" class="fa fa-tumblr"><span>Google+</span></a></li>
				</ul>
			</section>
		</div>
	</div>
	<!-- /Footer -->
	</body>
</html>