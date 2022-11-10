<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="index.php?controller=Login">Login</a></li>
				<li><a href="index.php?controller=Register">Sign Up</a></li>
			</ul>
		</nav>
		<main>
		<h1>Courses</h1>
			<ul class="course-list">
				<?php 
				
					//print_r($courses);
					for($i=0;$i<count($courses);$i++){
						//create new list item
						echo "<li>";
						echo "<div> <a href='#'><img src=images/".$courses[$i]['course_image']."></a> </div>";
						echo "<div> <a href='#'> 
						<span class='faculty-department'>Faculty or Department</span>
						<span class='course-title'>".$courses[$i]['course_name']."</span>
						<span class='instructor'>".$instructors[$i]['instructor_name']."</span>
						</a> </div>";
						echo "<div> <center><p> Get Curios </p></center> <a href='#' class='startnow-button startnow-btn'>Start Now!</a></div>";
						echo "</li>";
					}
				?>
			</ul>
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