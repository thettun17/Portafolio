<div class="topic">
  <div class="row">
    <div class="col-sm-4 col-md-3 sidebar">
      <div class="mini-submenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </div>
      <div class="list-group">
        <span href="#" class="list-group-item active">
<?php
$name = get_couseName($course_id);
echo $name['name'];
?>
<span class="pull-right" id="slide-submenu">
            <i class="fa fa-times"></i>
          </span>
        </span>
<?php
$results = getTopic($course_id);
foreach ($results as $result) {
	?>
															         <a href="#<?php echo $result['id'];?>" class="list-group-item">
															          <i class="fa fa-angle-double-right"></i> <?php echo $result['title'];
	?>
	</a>
	<?php }?>
   </div>
 </div>
</div>
</div>