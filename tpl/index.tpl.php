<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="/"><img src="images/logo.png" alt="Quwius"></a>
			<ul>
				<li><a href="courses.php">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="Login.php">Login</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			</ul>
		</nav>
		<div id="lead-in">
		<h1>Feed Your Curiosity,<br>
				Take Online Courses from UWI</h1>

			<form name="course_search" method="post" action="index.php?controller=">
				<div class="wide-thick-bordered" >
				<input class="c-banner-search-input" type="text" name="formSearch" value="" placeholder="Find the right course for you">
				<button class="c-banner-search-button"></button>
				</div>
			</form>
		</div>
		<header></header>
		<main>
			<h1> Most Popular </h1>

		<?php
			
			if (!empty($courses)){
		
				//store popular column
				$popular = $courses['popular'];
				//store recommended column
				$recommended = $courses['recommended'];
			}else{
				echo "courses is empty";
			}
		?>
				
				<div class="centered"> 
					
					<?php
						//loop to print first 4 of 8 popular
						for ($i=0; $i<4;$i++)
						{
							
							//open section
							echo " <section>";
							//print images
							echo "<a href='#'><img src=images/".$popular[$i]['course_image'].">";
							//print course titles
							echo "<span class='course-title'>".$popular[$i]['course_name']."</span></a>";
							//print instructors
							echo "<span>".$instructors[$i]['instructor_name']."</span></a>";
							//close section
							echo " </section>";
					
						}
					?>	
				</div>
				<div class="centered"> 
					
					<?php
						//loop to print last 4 of 8 popular
						for ($i=4; $i<8;$i++)
						{
							//open section
							echo " <section>";
							//print images
							echo "<a href='#'><img src=images/".$popular[$i]['course_image'].">";
							//print course titles
							echo "<span class='course-title'>".$popular[$i]['course_name']."</span></a>";
							//print instructors
							echo "<span>".$instructors[$i]['instructor_name']."</span></a>";
							//close section
							echo " </section>";
					
						}
					?>	
				</div>
				<h1> Learner Recommended</h1>
				<div class="centered"> 
					
					<?php
						//loop to print first 4 of 8 recommended
						for ($i=0; $i<4;$i++)
						{
							//open section
							echo " <section>";
							//print images
							echo "<a href='#'><img src=images/".$recommended[$i]['course_image'].">";
							//print course titles
							echo "<span class='course-title'>".$recommended[$i]['course_name']."</span></a>";
							//print instructors
							echo "<span>".$instructors[$i]['instructor_name']."</span></a>";
							//close section
							echo " </section>";
					
						}
					?>	
				</div>
				<div class="centered"> 
					
					<?php
						//loop to print last 4 of 8 recommended
						for ($i=4; $i<8;$i++)
						{
							//open section
							echo " <section>";
							//print images
							echo "<a href='#'><img src=images/".$recommended[$i]['course_image'].">";
							//print course titles
							echo "<span class='course-title'>".$recommended[$i]['course_name']."</span></a>";
							//print instructors
							echo "<span>".$instructors[$i]['instructor_name']."</span></a>";
							//close section
							echo " </section>";
					
						}
					?>	
				</div>
				<footer>
				<nav>
					<ul>
						<li>&copy;2018 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>	
		</main>
	</body>
</html>