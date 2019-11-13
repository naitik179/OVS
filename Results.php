<?php
session_start();

if (!isset($_SESSION['userid'])) {
	header('Location: http://localhost:8000/OVS/Login.php');  

}
else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
        	session_destroy();
        	header('Location: http://localhost:8000/OVS/Login.php');  
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
        	<body>

        		<!-- Header -->
        		<div id="header">
        			<div id="nav-wrapper"> 
        				<!-- Nav -->
        				<nav id="nav">
        					<ul>
        						<li><a href="index.php">Home</a></li>
        						<li><a href="Apply Candidature.php">Apply Candidature</a></li>
        						<li class="active"><a href="Results.php">Results</a></li>
        						<a href="Logout.php"><li id="userid"><?= $_SESSION['userid']?></li></a>
        					</ul>
        				</nav>
        			</div>
        		</div>
        		<!-- Header --> 

        		<!-- Main -->
        		<div id="main">
        			<div id="content" class="container">
        				<section>
        					<header>
        						<h2>Results</h2>
        						<span class="byline"></span>
        					</header>
        					<p>This is <strong>Online </strong> Election Handling System.This voting System can be used for casting votes during the Elections held in Colleges, Departments, Councils, Organization etc. In this system the voter do not have to go to the polling booth to cast their vote. </p>
        					<div class="row">
        						<?php 

        						$localhost = "localhost";
        						$username = "root";
        						$password = "";
        						$db = "online_voting";


        						$conn = mysqli_connect($localhost,$username,$password,$db);
        						if(!$conn)
        							echo "Connection error : " .mysqli_connect_error();

        						$date=date("Y-m-d");
        						$date1=(string)$date;

        						$time=date("H:m:s");
        						$time1=(string)$time;

        						$append=$date1." ".$time1;
        						$append1=(string)$append;


        						$retrieving_data = "select * from election where end_date < '". $append1."'";
        						$result = $conn->query($retrieving_data);

        						$hash1=array();
        						$hash2=array();





        						if ($result->num_rows > 0) {
        							while($row = $result->fetch_assoc()) { ?>

        								<section class="4u">
        									


        									<?php 

        									if(strcmp($append,$row['end_date']>0))
        									{
        										$product=0;
        										?>
        										<span class="pennant"><span class="fa fa-briefcase"></span></span>
        										<h3><?= $row['post']; ?></h3>

        										<a href="DisplayResults.php?id=<?= $row['election_id']?>" class="button button-style1">View Result</a>

        										<?php

        									}


        									?>



        								</section>

        								<?php 
        							}

        						}
        						?>
        					</div>
        				</section>
        			</div>
        		</div>
        		<!-- /Main -->

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