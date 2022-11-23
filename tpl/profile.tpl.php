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
		<h1>Profile Page</h1>
		<h2>Enrolled Courses</h2>
		<center><p> 
			<!-- PRINT STATUS MESSAGE IF USER HAS SUCCESFULLY UNROLLED OR ENROLLED-->
			<?php 
				  if (isset($success)){echo $success;}
			      if (isset($fail)){echo $fail;}?>
				</p></center>
		<ul class="course-list">
		<?php 
					$display = [];//this will store all course information for courses user is enrolled in
					
					//Run a loop that will compare the course ids in user courses to the ids in the courses tables to extract all other neessary data on course
					for($i=0;$i<count($courses);$i++ ){
						//loop array of courses user enrolled in
						for($j=0;$j<count($user_courses);$j++){
							//locate the current user course in the main courses array
							
							if ($user_courses[$j]['course_id'] == $courses[$i]['course_id']){
								//print_r( $allCourses[$i]['course_id']. "<br>") ;
								array_push($display,$courses[$i]) ;//add current course info to display array
							}
						}
					}
					
					//loop throught display variable and print each record
					$k=0;
					for($k=0;$k<count($display);$k++){
						//create new list item
						echo "<li>";
						echo "<div> <a href='#'><img src=images/".$display[$k]['course_image']."></a> </div>";
						echo "<div> <a href='#'> 
						<span class='faculty-department'>Faculty or Department</span>
						<span class='course-title'>".$display[$k]['course_name']."</span>
						<span class='instructor'>Course Instructor</span>
						</a> </div>";
						echo "<div> <a href='#' class='startnow-btn startnow-button'>Go to Class!</a> 
						<form method='post' action='unenroll.php'>
							<a href='unenroll.php' class='startnow-btn unenroll-button'>
						<button style='border:none;background:none;'>Unenroll</button></a>
						<input type='hidden' name='course' value='".$display[$k]['course_id']."'></form></div>";
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