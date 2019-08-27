<?php
require_once __DIR__ .'/../inc/bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$search = $request->get('search');
	if (empty($search)) {
		$session->getFlashBag()->add('error', 'Please enter text filed');
	} else {
		$courses = all_courses($search);
		foreach ($courses as $course) {
			echo $course['naem'];
		}
	}
}
?>