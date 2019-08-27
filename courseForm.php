<?php
require_once __DIR__ .'/inc/bootstrap.php';
require_once __DIR__ .'/inc/header.php';
if ($session->getFlashBag()->has('error')) {
	echo '<div class="alert alert-danger alert-dismissable">';
	foreach ($session->getFlashBag()->get('error') as $message) {
		echo "{$message}<br>";
	}
	echo '</div>';
}
if ($session->getFlashBag()->has('success')) {
	echo '<div class="alert alert-success alert-dismissable">';
	foreach ($session->getFlashBag()->get('success') as $message) {
		echo "{$message}<br>";
	}
	echo '</div>';
}
?>
<style type="text/css">
	.error {
		color: red;
		display: block;
	}
	.no-error {
		display: none;
	}
</style>
<div class="container">
	<h2>Add Course</h2>
	<form method="post" action="/procedures/addcourse.php" enctype="multipart/form-data" id="form">
		<div class="form-group">
			<label for="course_name">Name</label>
			<input type="text" class="form-control" id="course_name" name="course_name" placeholder="Example Course Name">
			<span id="alert-message" class="no-error">Please Enter Name</span>
		</div>
		<div class="form-group">
			<label for="course_image">Another label</label>
			<input type="file" id="image" class="form-control" name="course_image" required>
			<span id="alert-message" class="no-error">Please Select Image</span>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit"  id="button" class="btn btn-primary">Add</button>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	var form = document.getElementById("form");
	var alert_message = document.getElementById("alert-message");
	var course_name = document.getElementById("course_name");
	var image = document.getElementById("image");
	var button = document.getElementById("button");
	button.onclick = function(){
		if(course_name.value.length == 0 ) {
			//form.removeAttribute("action");
			course_name.style.borderColor = "red";
			image.style.borderColor = "red";
			alert_message.classList.remove("no-error");
			alert_message.classList.add("error");
		} else {
			course_name.style.borderColor = "";
			image.style.borderColor = "";
			alert_message.classList.remove("error");
			alert_message.classList.add("no-error");
		}
	}
</script>
<?php
require_once __DIR__ .'/inc/footer.php';
?>