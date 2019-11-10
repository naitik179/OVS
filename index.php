<?php
    session_start();

    if (!isset($_SESSION['userid'])) {
        echo "Please Login again";
        echo "<a href='http://localhost:8000/OVS/Login.php'>Click Here to Login</a>";
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='http://localhost:8000/OVS/Login.php'>Login here</a>";
        }
        else { //Starting this else one [else1]
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>OVS Online Voting</title>
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

<body class="homepage">

	<!-- Header -->
	<div id="header">
		<div id="nav-wrapper">
			<!-- Nav -->
			<nav id="nav">
				<ul>
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="Apply Candidature.php">Apply Candidature</a></li>
					<li><a href="Results.php">Results</a></li>
				</ul>
			</nav>
		</div>
		<div class="container">

			<!-- Logo -->
			<div id="logo">
				<h1><a href="#">Online Voting System</a></h1>
				<span class="tag">By team OVS</span>
			</div>
		</div>
	</div>

	<!-- Featured -->
	<div id="featured">
		<div class="container">
			<header>
				<h2>Welcome</h2>
			</header>
			<p>This is <strong>Online </strong> Election Handling System.This voting System can be used for casting votes during the Elections held in Colleges, Departments, Councils, Organization etc. In this system the voter do not have to go to the polling booth to cast their vote. </p>
			<hr />
			<p style="font-family: sans-serif;text-align: center;color: black;font-size: 3.2em;"> Ongoing Elections </p>
			<div class="row">
				<section class="4u">
					<span class="pennant"><span class="fa fa-briefcase"></span></span>
					<h3>Election for Class Representative</h3>
					<p>Elections for Class Representative for Class IT - B . Scheduled on Sunday date 22nd of November, 2019</p>
					<a href="#" class="button button-style1">Vote</a>
				</section>
				<section class="4u">
					<span class="pennant"><span class="fa fa-lock"></span></span>
					<h3>Elections for Council</h3>
					<p>Elections for the Annual General Students Council Election for A.Y 2020</p>
					<a href="#" class="button button-style1">Vote</a>
				</section>
				<section class="4u">
					<span class="pennant"><span class="fa fa-globe"></span></span>
					<h3>Elections for Sports Head</h3>
					<p>Elections for the Annual Sports Incharge for A.Y 2020</p>
					<a href="#" class="button button-style1">Vote</a>
				</section>

			</div>
		</div>
	</div>

	<!-- Main -->
	<!-- <div id="main">
		<div id="content" class="container">

			<div class="row">
				<section class="6u">
					<a href="#" class="image full"><img src="images/pic01.jpg" alt=""></a>
					<header>
						<h2>Mauris vulputate dolor</h2>
					</header>
					<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
				</section>
				<section class="6u">
					<a href="#" class="image full"><img src="images/pic02.jpg" alt=""></a>
					<header>
						<h2>Mauris vulputate dolor</h2>
					</header>
					<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
				</section>
			</div>

			<div class="row">
				<section class="6u">
					<a href="#" class="image full"><img src="images/pic03.jpg" alt=""></a>
					<header>
						<h2>Mauris vulputate dolor</h2>
					</header>
					<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
				</section>
				<section class="6u">
					<a href="#" class="image full"><img src="images/pic04.jpg" alt=""></a>
					<header>
						<h2>Mauris vulputate dolor</h2>
					</header>
					<p>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim. Aliquam erat volutpat. Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
				</section>
			</div>

		</div>
	</div> -->

	<!-- Tweet -->
	<div id="tweet">
		<div class="container">
			<section>
				<blockquote>&ldquo;Voting is the expression of our commitment to ourselves, one another, this country and this world.&rdquo;</blockquote>
			</section>
		</div>
	</div>

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

	<!-- Copyright -->
	<div id="copyright">
		<div class="container">
		Made By Team OVS
		</div>
	</div>

</body>

</html>

<?php
        }
    }
?>