<?php
$route = $_SERVER['PHP_SELF'];
?>
<div class="home-wapper">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3 text-white text-center">
<?php if ($route == '/all_courses.php') {?>
	<h1 class="heading-title"> All Courses </h1>
	<?php } else {?>
	<h1 class="heading-title">E-Learning Site</h1>
						<p>This is Online Training site for web development</p>
						<a href="#content" class="btn  btn-info btn-md mt-3">Get Started!</a>
	<?php }?>
			</div>
		</div>
	</div>
</div>