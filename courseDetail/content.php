<div class="content">
<?php
$results = getTopic($course_id);
foreach ($results as $result) {
	?>
				    <h2 id="<?php echo $result['id'];?>"><?php echo $result['title'];
	?></h2>
							<p><?php echo $result['body'];?></p>
							<hr>
	<?php }?>

      </div>