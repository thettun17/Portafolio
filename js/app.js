$(window).on('load', function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
});


window.onscroll = function() {
	myFunction();
	backToTop();
};
var navbar = document.getElementById("navbar");
var toTop = document.getElementById("toTop");
function myFunction() {
	if (window.pageYOffset >= 20) {
		navbar.classList.add("sticky");
	} else {
		navbar.classList.remove("sticky");
	}
}
function backToTop() {
	if(window.pageYOffset >= 500) {
		toTop.style.opacity = 1;
	} else {
		toTop.style.opacity = 0;
	}
}

/*======= Get Route ==========*/
const route = window.location.href;
const header = document.getElementById('header');
if( route == 'http://localhost:8000/' || route == 'http://localhost:8000/index.php') {
	header.classList.remove("main-header");
} else {
	header.classList.add("main-header");
}


