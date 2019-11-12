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
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
                      <li id="userid"><?= $_SESSION['userid']?></li>
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
                  $election_id=(int)htmlspecialchars($_GET['id']);
                                // echo gettype($election_id);
                  $localhost = "localhost";
                  $username = "root";
                  $password = "";
                  $db = "online_voting";


                  $conn = mysqli_connect($localhost,$username,$password,$db);
                  if(!$conn)
                     echo "Connection error : " .mysqli_connect_error();

                 $count="select user.name, user.user_id, candidate.user_id, candidate.vote_count from candidate, user where election_id=".$election_id." AND candidate.user_id=user.user_id";
                 $winnerquery="select user.name, candidate.vote_count from candidate, user where election_id=".$election_id." AND candidate.user_id=user.user_id AND candidate.vote_count= ( select MAX(vote_count) from candidate )";
                 $nrows=$conn->query($count);
                 $n=$nrows->num_rows;
                 $winner=$conn->query($winnerquery);
                 ?>

                 <div id="chartContainer" style="height: 450px; width: 60%;"></div>
                 <div id="winnername_container">The Winner is<br>
                    <span id="winnername">                    <?php
                    $displaywinner=$winner->fetch_assoc();
                    echo $displaywinner['name'];
                    ?>
                        
                    </span>
                 </div>
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
<script>
    window.onload = function () {
        // alert("loaded");
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title:{
                text: "Results"
            },  
            axisY: {
                title: "No Of Votes",
                titleFontColor: "#000000",
                lineColor: "#000000",
                labelFontColor: "#000000",
                tickColor: "#4F81BC"
            },
            axisX: {
                title: "Candidates",
                titleFontColor: "#000000",
                lineColor: "#000000",
                labelFontColor: "#000000",
                tickColor: "#4F81BC"
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor:"pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Votes", 
                    dataPoints:[
                    <?php 
                    if ($nrows->num_rows > 0) {
                        while($row = $nrows->fetch_assoc()) { ?>

                            { label: "<?= $row['name']?>", y: <?= $row['vote_count']?> },

                            <?php 
                        }
                    }

                    ?>

                    ]
                },
                ]
            });
        chart.render();

        function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            }
            else {
                e.dataSeries.visible = true;
            }
            chart.render();
        }

    }
</script>



<?php
}
}
?>