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
				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<main>
		<h1>Profile Page</h1>
		<h2>Enrolled Courses</h2>
		<ul class="course-list">
		<?php 
					$display = [];
					for($i=0;$i<count($allCourses);$i++ ){
						
						for($j=0;$j<count($courses);$j++){
							if ($allCourses[$i]['course_id'] == $courses[$j]['course_id']){
								//print_r( $allCourses[$i]['course_id']. "<br>") ;
								array_push($display,$allCourses[$i]) ;
							}
						}
					}
					
					//print_r($data);
					for($k=0;$k<count($display);$k++){
						//create new list item
						echo "<li>";
						echo "<div> <a href='#'><img src='".$display[$k]['course_image']."'></a> </div>";
						echo "<div> <a href='#'> 
						<span class='faculty-department'>Faculty or Department</span>
						<span class='course-title'>".$display[$k]['course_name']."</span>
						<span class='instructor'>Course Instructor</span>
						</a> </div>";
						echo "<div> <a href='#' class='startnow-btn startnow-button'>Go to Class!</a> <a href='#' class='startnow-btn unenroll-button'>Unenroll</a></div>";
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