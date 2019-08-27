<?php
require_once __DIR__ .'/inc/header.php';
require_once __DIR__ .'/inc/bootstrap.php';
/*======== Session ==============*/
if ($session->getFlashBag()->has('error')) {
	echo '<div class="alert alert-danger alert-dismissable">';
	foreach ($session->getFlashBag()->get('error') as $message) {
		echo "{$message}<br>";
	}
	echo '</div>';
}
/*======== Pagenation ==========*/
$search        = $request->get('search');
$item_per_page = 8;
if ($_GET['pg']) {
	$current_page = filter_input(INPUT_GET, "pg", FILTER_SANITIZE_NUMBER_INT);
}
if (empty($current_page)) {
	$current_page = 1;
}
$total_items  = get_count_course($search);
$total_page   = ceil($total_items/$item_per_page);
$offset       = ($current_page-1)*$item_per_page;
$limit_result = "";
if (!empty($search)) {
	$limit_result = "search=".urldecode(htmlspecialchars($search))."&";
}
if ($current_page > $total_page) {
	header("Location:all_courses.php"
		.$limit_result
		."pg=".$total_page
	);
}
if ($current_page < 1) {
	header("location:all_courses.php"
		.$limit_result
		."pg=1"
	);
}

/*========= SIMPLY SELECT =============*/
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$result = all_courses($search, $item_per_page, $offset);
	if (empty($result)) {
		$session->getFlashBag()->add('error', 'The enter you search is not exit');
		header("location:all_courses.php");
	} else {
		$courses = $result;
	}
}
/*if ($_SERVER['REQUEST_METHOD'] == 'GET') {
$courses = all_courses($search, $item_per_page, $offset);
}*/
?>
<h2 id="courses" class="display-4 text-center text-white course-title py-5">You can learn this Courses</h2>
<div class="container">
	<!-- Search Form -->
	<div class="d-flex justify-content-end search_div">
		<form class="form-inline my-2 my-lg-0" action="all_courses.php" method="GET">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
			<button class="btn btn-primary my-2 my-sm-0 btnsearch" type="submit">Search</button>
		</form>
	</div>
	<!-- /Search Form -->
	<!-- Row -->
	<div class="row">
<?php require_once __DIR__ .'/course_cart.php';?>
</div><!-- End Row -->
	<!-- Pagination -->
<?php if ($total_items > 8) {?>
	<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
	<?php
	if ($current_page <= 1) {
		?>
		<a class="page-link disabled" aria-label="Previous" >
													<span aria-hidden="true" >&laquo;</span>
													<span class="sr-only">Previous</span>
												</a>
		<?php } else {?>
												<a class="page-link" href="all_courses.php?pg=<?php echo $current_page-1;?>" aria-label="Previous">
													<span aria-hidden="true" >&laquo;</span>
													<span class="sr-only">Previous</span>
												</a>
		<?php }?>
	</li>
	<?php
	for ($i = 1; $i <= $total_page; $i++) {
		if ($i == $current_page) {
			echo "<li class='page-item'><a class='page-link pactive' href='all_courses.php'> $i </a></li>";
		} else {
			echo "<li class='page-item'><a class='page-link' href='all_courses.php?";
			if (!empty($search)) {
				echo "search=".urldecode(htmlspecialchars($search))."&";
			}
			echo "pg=$i'>$i</a></li>";
		}
	}

	?>
	<li class="page-item">
	<?php if ($current_page >= $total_page) {
		?>
		<a class="page-link disabled"  aria-label="Next">
													<span aria-hidden="true">&raquo;</span>
													<span class="sr-only">Next</span>
												</a>
		<?php } else {?>
												<a class="page-link" href="all_courses.php?pg=<?php echo $current_page+1;?>" aria-label="Next">
													<span aria-hidden="true">&raquo;</span>
													<span class="sr-only">Next</span>
												</a>
		<?php }?>
	</li>
						</ul>
					</nav>
	<?php }?>
<!-- /Pagination -->
</div>
<?php
require_once __DIR__ .'/inc/footer.php';
?>