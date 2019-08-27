<?php
/*require_once __DIR__ .'/inc/bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$search = $request->get('search');
if (empty($search)) {
$session->getFlashBag()->add('error', 'Please enter text filed');
} else {
$courses = all_courses($search);
}
} else {
$courses = all_courses();
}*/
foreach ($courses as $course) {
	?>
						<div class="col-md-3 my-2">
							<div class="product-grid6">
								<div class="product-image6">
									<a href="../courseDetail/index.php?id=<?php echo $course['id'];?>">
										<img class="pic-1" src="../images/<?php echo $course['image'];?>">
									</a>
								</div>
								<div class="product-content">
									<h3 class="title py-auto"><a href="../courseDetail/index.php?id=<?php echo $course['id'];?>"><?php echo $course['name']?></a></h3>
								</div>
								<ul class="social">
									<li><a href="../courseDetail/index.php?id=<?php echo $course['id'];?>" class="btn btn-outline-info">Read More</a></li>
								</ul>
							</div>
						</div>
	<?php }?>
