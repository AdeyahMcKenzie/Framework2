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
				<li><a href="courses.php">Courses</a></li>
				<li><a href="stream.php">Streams</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
		<main>
		<h1>Courses</h1>
			<ul class="course-list">
				<?php 
					echo "<center><p>"; 
					  if (isset($fail)){echo $fail;}
					echo "</p></center>";
				
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
						echo "<div> <center><p> Get Curios </p></center>" ?>
						<form method='post' action='enroll.php'>
						<input type='hidden' name='course' value="<?php echo $courses[$i]['course_id'];?>">
						<a href='enroll.php' class='startnow-button startnow-btn'><button style='border:none;background:none;'>Start Now!</button></a>
						</form></div>
						</li>
				<?php
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