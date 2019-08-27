<?php
require_once __DIR__ .'/../inc/bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$course_name = $request->get('course_name');
	$cover       = $_FILES['course_image']['name'];
	$tmp         = $_FILES['course_image']['tmp_name'];
	if (empty($course_name) || empty($cover)) {
		$session->getFlashBag()->add('error', 'Please add all text-box');
		header("Location: ../courseForm.php");
	} else {
		move_uploaded_file($tmp, "../images/".$cover);
		if (addCourse($course_name, $cover)) {
			$session->getFlashBag()->add('success', 'Cours Added');
			redirect('/courseForm.php');
		} else {
			$session->getFlashBag()->add('error', 'Unable to Add Course');
			redirect('/courseForm.php');
		}
	}
} 
?>