<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Streams | Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="#">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="index.php?controller=Login">Login</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			</ul>
		</nav>
		<div id="streams-lead-in">
		<h1>Take specialized courses<br>
				Earn Streams Certifications</h1>
		</div>
		<header id="streams-header"></header>
		<main class="streams">
			<div class="centered">
		<?php

						
						//loop to print first 4 of 8 streams
						for ($i=0; $i<4;$i++)
						{
								
							//open section 
							echo "<section class='streams'> ";
							//print image
							echo "<a href='#'><img src='images/".$streams[$i]['stream_image']."' alt='Data Science Stream' title='Data Scientist'>
							";
							//print course title
							echo "<span class='course-title padded'>".$streams[$i]['stream_name']."</span>";
							//print instructors
							echo "<span class='padded'>";
							for ($j=0;$j<count($stream_instructors);$j++){
								//if a match is found in the stream instructors table
								if($streams[$i]['stream_id'] == $stream_instructors[$j]['stream_id']){
									//find the stream lecturer for the course
									for ($k=0;$k<count($instructors);$k++){
										if ($stream_instructors[$j]['instructor_id'] == $instructors[$k]['instructor_id'] ){
											echo $instructors[$k]['instructor_name'];//print name of current instructor
										}
									}
								}
							}
							
							echo "</span></a>";
							//close section
							echo " </section>";
					
						}
					?>	
			</div>
			<div class="centered">
			<?php

						
						//loop to print last 4 of 8 streams
						for ($i=4; $i<8;$i++)
						{
								
							//open section 
							echo "<section class='streams'> ";
							//print image
							echo "<a href='#'><img src='images/".$streams[$i]['stream_image']."' alt='Data Science Stream' title='Data Scientist'>
							";
							//print course title
							echo "<span class='course-title padded'>".$streams[$i]['stream_name']."</span>";
							//print instructors
							echo "<span class='padded'>";
							for ($j=0;$j<count($stream_instructors);$j++){
								//if a match is found in the stream instructors table
								if($streams[$i]['stream_id'] == $stream_instructors[$j]['stream_id']){
									//find the stream lecturer for the course
									for ($k=0;$k<count($instructors);$k++){
										if ($stream_instructors[$j]['instructor_id'] == $instructors[$k]['instructor_id'] ){
											echo $instructors[$k]['instructor_name'];//print name of current instructor
										}
									}
								}
							}
							
							echo "</span></a>";
							//close section
							echo " </section>";
					
						}
					?>	
			</div>
			<footer>
				<nav>
					<ul>
						<li>&copy;2015 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>