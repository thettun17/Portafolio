<?php
require_once __DIR__ .'/../inc/bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$course_id  = $request->get('course_id');
	$topic_name = $request->get('topic_name');
	$body       = $request->get('topic_body');
	if (empty($course_id) || empty($topic_name) || empty($body)) {
		$session->getFlashBag()->add('error', 'Please add all text-box');
		header("Location: ../topicForm.php");
	} else {
		if (addTopic($topic_name, $body, $course_id)) {
			$session->getFlashBag()->add('success', 'Cours Added');
			redirect('/topicForm.php');
		} else {
			$session->getFlashBag()->add('error', 'Unable to Add Topic');
			redirect('/topicForm.php');
		}
	}
}
?>