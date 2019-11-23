<?php
$route = $_SERVER['PHP_SELF'];
?>
</section>
<a href="#top" id="toTop" style="display: block;"><img src="../images/logo-uparrow.svg"></a>
<footer>
	<div class="container">
		<div class="row section-footer">
			<div class="col-md-4 mobile-view-footer">
				<h5 class="text-white footer-header">Follow Me</h5>
				<ul class="footer-contact-list">
					<li><a href=""><img src="../images/logo-facebook.svg"></a></li>
					<li><a href=""><img src="../images/logo-twitter.svg"></a></li>
					<li><a href=""><img src="../images/logo-instagram.svg"></a></li>
				</ul>
			</div>
			<div class="col-md-4">
				<h5 class="text-white footer-header">Popular Topics</h5>
				<ul class="text-white popular-topics">
					<li>Node js</li>
					<li>View js</li>
					<li>Laravel Framework</li>
				</ul>
			</div>
			<div class="col-md-4">
				<h5 class="text-white footer-header">Subscription</h5>
				<p class="text-white">
					Please subscribe to us to get new topics. After subscripting, we will send you latest topics.
				</p>
				<form class="form-inline" method="post" action="../subscribe.php">
					<input type="hidden" name="route" value="<?php echo $route;?>">
					<input class="mail-input form-control mr-sm-2" type="email" placeholder="Enter your email address...." name="email" aria-label="Search">
					<button class="btn btn-success mail-submit my-2 my-sm-0" type="submit">JOIN</button>
				</form>
			</div>
		</div>
	</div>
	<div class="footer-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6"><h5 class="text-white footer-logo"><a href=""><span class="text-color">EL</span>earning <span class="text-color">S</span>ite</a></h5></div>
				<div class="col-md-6">
					<ul class="text-white d-flex justify-content-end">
						<li>&copy; 2019 Thet Tun</li>
						<li>&nbsp;
							&nbsp;
							|&nbsp;
							&nbsp;
						<a href="">Home</a></li>
						<li> &nbsp;
							&nbsp;
							|&nbsp;
							&nbsp;
						<a href="">About</a></li>
						<li> &nbsp;
							&nbsp;
							|&nbsp;
							&nbsp;
						<a href="">Courses</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- Script -->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
</body>
</html>