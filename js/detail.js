$(function(){
  $('#slide-submenu').on('click',function() {             
    $(this).closest('.list-group').fadeOut(200,function(){
      $('.mini-submenu').fadeIn(200);  
    });
    $('.content').innerWidth('98%');
  });
  $('.mini-submenu').on('click',function(){   
    $(this).next('.list-group').toggle(200);
    $('.mini-submenu').hide();
    if($(window).width() <= 796) {
      $('.content').innerWidth('43%');
    } else {
      $('.content').innerWidth('75%');
    }
  })
})

/*=========== Drop Down =================*/
function toggleSub() {
  var obj = document.getElementById("sub");
  if( obj.style.display == "block" ) {
    obj.style.display = "none";
  } else {
    obj.style.display = "block";
  }
}
