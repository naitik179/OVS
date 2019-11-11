<?php
    session_start();

    if (!isset($_SESSION['userid'])) {
        header('Location: http://localhost/OVS/Login.php');  
					    	    
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
        header('Location: http://localhost/OVS/Login.php');  
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
					<li id="userid"><?= $_SESSION['userid']?></li>
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
			<?php
					$localhost = "localhost";
  					$username = "root";
 					 $password = "password";
 					 $db = "online_voting";
  

 					 $conn = mysqli_connect($localhost,$username,$password,$db);
 					 if(!$conn)
  						echo "Connection error : " .mysqli_connect_error();
					   
  							$type= settype($_SESSION['type'],'integer');
					    	$retrieving_data = "select * from election where election_type=".$type;
					    	$result = $conn->query($retrieving_data);

					    	if ($result->num_rows > 0) {
					    	    while($row = $result->fetch_assoc()) {
					    	      ?>
					    	      <section class="4u">
									<span class="pennant"><span class="fa fa-briefcase"></span></span>
									<h3><?= $row['post'] ?></h3>
									<a href="#" class="button button-style1">Vote</a>
								</section>
					    	    <?php 
					    			}
					    		}
					    		 ?>
</div>

><br><br>

			

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
	</div><br><br>

	<!-- Copyright -->
	<div id="copyright">
		<div class="container">
		Made By Team OVS
		</div>
	</div>

</body>
<?php 
}
} ?>
</html>