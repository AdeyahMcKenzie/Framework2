<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius - Course Unenrollment</title>
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
		<h1>Are You Sure You Want to Unenroll from this Course?</h1>

		<ul class="course-list">
			<li><div>
				<?php 
				echo"<a href='#'><img src=images/".$courseInfo['course_image']." alt='course image'></a>
				</div>";
				echo "<div>
				<a href='#'><span class='faculty-department'>Faculty or Department</span>";	
				echo"	<span class='course-title'>".$courseInfo['course_name']."</span>";
				echo"<span class='instructor'>".$instructor['instructor_name']."</span></a>
				</div>
				<div>";
			?>
				<form action="unenrollhandler.php" method="POST">
					<a href="profile.php" class="startnow-btn startnow-button">Cancel</a>
					<a href='#' class='startnow-btn unenroll-button'><button style='border:none;background:none;'>Okay</button></a><input type='hidden' name='course' value="<?php echo $courseInfo['course_id'] ?> ">
				</form>
				
				</div>
			</li>
			
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