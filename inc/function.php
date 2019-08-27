<?php
/*======== Session ===========*/
$session = new \Symfony\Component\HttpFoundation\Session\Session();
$session->start();
/*======= Request ========*/
use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();
// redirect \Symfony\Component\HttpFoundation\Response

function redirect($path) {
	$response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND, ['Location' => $path]);
	$response->send();
	exit;
}
/*============= Add Course ============*/

function addCourse($name, $cover) {
	global $conn;
	try {
		$sql  = "insert into courses(name, image) values(:name, :image)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':image', $cover);
		$stmt->execute();
		return true;
	} catch (Exception $e) {
		echo "Error ".$e->getMessage();
	}
}

/*======== ADD TOPIC =========*/
function addTopic($topic_naem, $body, $course_id) {
	global $conn;
	try {
		$sql  = "insert into topics(title, body, course_id) values(:title, :body, :course_id)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':title', $topic_naem);
		$stmt->bindParam(':body', $body);
		$stmt->bindParam(':course_id', $course_id);
		$stmt->execute();
		return true;
	} catch (Exception $e) {
		echo "Error ".$e->getMessage();
		return false;
	}
}

/*======== GET COURSES NAME =======*/
function get_couseName($id) {
	global $conn;
	try {
		$sql  = "select name from courses where id = :id ";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	} catch (Exception $e) {
		echo "Error ".$e->getMessage();
		return false;
	}
}

/*======= GET Courses Count ========*/
function get_count_course($course = null) {
	global $conn;
	try {
		$sql = "SELECT COUNT(id) FROM courses";
		if (!empty($course)) {
			$result = $conn->prepare("SELECT COUNT(id) FROM courses WHERE name LIKE '%$course%'"
			);
		} else {
			$result = $conn->prepare($sql);
		}
		$result->execute();
	} catch (Exception $e) {
		echo "Error ".$e->getMessage();
	}
	$count = $result->fetchColumn(0);
	return $count;
}
/*========== GET COURSES =============*/
function get_courses() {
	global $conn;
	try {
		$sql     = "SELECT * FROM courses";
		$results = $conn->prepare($sql);
		$results->execute();
	} catch (Exception $e) {
		echo "ERRROR ".$e->getMessage();
	}
	return $results->fetchAll();
}

/*======== Get all courses =========*/
function all_courses($search = null, $limit = null, $offset = 0) {
	global $conn;
	try {
		if (empty($search)) {
			$sql    = "SELECT * FROM courses";
			$result = $conn->prepare($sql);
			if (is_integer($limit)) {
				$result = $conn->prepare($sql." LIMIT ? OFFSET ?");
				$result->bindParam(1, $limit, PDO::PARAM_INT);
				$result->bindParam(2, $offset, PDO::PARAM_INT);
			}
		} else {
			$sql    = "SELECT * FROM courses WHERE name LIKE '%$search%' ";
			$result = $conn->prepare($sql);
			if (is_integer($limit)) {
				$result = $conn->prepare($sql." LIMIT ? OFFSET ?");
				$result->bindParam(1, $limit, PDO::PARAM_INT);
				$result->bindParam(2, $offset, PDO::PARAM_INT);
			}
		}
		$result->execute();
	} catch (Exception $e) {
		echo "Error ".$e->getMessage();
	}
	return $result->fetchAll();
}

/*============== GET TOPIC ==================*/
function getTopic($id) {
	global $conn;
	try {
		$sql     = "select * from topics where course_id = :id ";
		$results = $conn->prepare($sql);
		$results->bindParam(':id', $id);
		$results->execute();
		return $results;
	} catch (Exception $e) {
		echo "Error ".$e;
	}
}