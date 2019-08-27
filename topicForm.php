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
	<h2>Add Topic</h2>
	<form method="post" action="/procedures/addTopic.php" enctype="multipart/form-data" id="form">
		<label for="course_id">Course ID</label>
		<select id="course_id" class="form-control" name="course_id">
<?php
$courses = get_courses();
foreach ($courses as $course) {
	?>
			<option value="<?php echo $course['id'];?>"><?php echo $course['name'];
	?></option>
	<?php }?>
</select>
		<div class="form-group">
			<label for="topic_name">Topic Name</label>
			<input type="text" class="form-control" id="topic_name" name="topic_name" placeholder="Please Enter Topic Name">
			<span id="alert-message" class="no-error">Please Enter Name</span>
		</div>
		<div class="form-group">
			<label for="body">Another label</label>
			<textarea id="body" name="topic_body" class="form-control">

			</textarea>
			<span id="alert-message" class="no-error">Please Select Image</span>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit"  id="button" class="btn btn-primary">Add</button>
			</div>
		</div>
	</form>
</div>
<?php
require_once __DIR__ .'/inc/footer.php';
?>