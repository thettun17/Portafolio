/* Adding Collapsible */
var coll = document.getElementsByClassName("collapsible-header");
var i;
for (i = 0; i < coll.length; i++) {
	coll[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var content = this.nextElementSibling;
		if (content.style.maxHeight){
			content.style.maxHeight = null;
		} else {
			content.style.maxHeight = content.scrollHeight + "px";
		} 
	});
}

$(document).ready(function() {
	const $location = $(location).attr('href');
	const $header = $('#header');
	const $duration = 800;
	const $nav = $('#navbar');
	const $backtoTop = $('#toTop');
	$(window).on('load', function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
	});
	$(window).on('scroll', function() {
		const $offset = $(window).scrollTop();
		if($offset >= 20) {
			$($nav).addClass('sticky');
		} else {
			$($nav).removeClass('sticky');
		}
		if($offset >= 500) {
			$($backtoTop).css('opacity', 1).fadeIn($duration);
		} else {
			$($backtoTop).css('opacity', 0).fadeOut($duration);
		}
	});
	$($backtoTop).click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, 500);
		return false;
	});
	/*======= Get Route ==========*/
	if( $location == 'http://localhost:8000/' || $location == 'http://localhost:8000/index.php') {
		$($header).removeClass("main-header");
	} else {
		$($header).addClass("main-header");
	}
});






