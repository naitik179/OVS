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
					<a href="Logout.php"><li id="userid"><?= $_SESSION['userid']?></li></a>
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
			
<p style="font-family: sans-serif;text-align: center;color: black;font-size: 3.2em;"> Candidates </p>		
<div class="row"> 
	<form method="POST" action="Save.php">
<?php 
$election_id= htmlspecialchars($_GET["id"]);

					$localhost = "localhost";
  					$username = "root";
 					 $password = "";
 					 $db = "online_voting";
  

 					 $conn = mysqli_connect($localhost,$username,$password,$db);
 					 if(!$conn)
  						echo "Connection error : " .mysqli_connect_error();
					   
  							$type= settype($_SESSION['type'],'integer');
  							$retrieving_vote= "SELECT * FROM vote";
  							$result_vote = $conn->query($retrieving_vote);
  							$flag=0;
  							if ($result_vote->num_rows > 0) {
					    	    while($row = $result_vote->fetch_assoc()) {
					    	    	if($row['election_id']==$election_id && $row['user_id']==$_SESSION['id'])
					    	    	{
					    	    		$flag=1;
					    	    	}
					    	    }
					    	}
					    	    	if($flag==1)
					    	    	{
					    	    		?>
					    	    		<p>Your vote has already been recorded. Thankyou!</p>
					    	    		<?php
					    	    	}
					    	    	else
					    	    	{
					    	    	
					    	$retrieving_data = "SELECT user.name,candidate.dob,candidate.description,candidate.user_id,candidate.id
												FROM user ,candidate
												WHERE user.user_id = candidate.user_id 
												AND candidate.election_id=".$election_id;
					    	$result = $conn->query($retrieving_data);
					    	$i=1;
					    	if ($result->num_rows > 0) {
					    	    while($row = $result->fetch_assoc()) {
					    	    	if($i==1){
					    	    		?>
					    	    		<input type="radio" name="vote_id" value="<?= $row['id'] ?>" checked> <h3><?= $row['name'] ?></h3><br>
					    	      	<p><?= $row['description'] ?></p><hr>
					    	    	
					    	    	<?php
					    	    }
					    	    	else{
					    	      ?>
					    	      	<input type="radio" name="vote_id" value="<?= $row['id'] ?>"> <h3><?= $row['name'] ?></h3><br>
					    	      	<p><?= $row['description'] ?></p><hr>									
							<?php 
											}
										}
									}
							?>
							<input type="submit" name="submit">
							</form>
							<?php
									}


							?>
</div>
</div>
	</div>
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