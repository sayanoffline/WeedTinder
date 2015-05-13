// JavaScript Document

//======================== Drop Down
$(document).ready(function(){
$('.menupan ul li').hover(
function () {
	$(this).addClass('active');
	$(this).children('ul').fadeIn('fast');
},
function () {
	$(this).removeClass('active');
	$(this).children('ul').fadeOut();
}
);
});



//============================ Responsive Menu
$(document).ready(function(){
	$('.menupan').prepend('<div class="menuTitle">Navigation</div>')
	$('.menuTitle').click(function(){
		$(this).next('ul').slideToggle();
	});
});


//============================ scroll top

$(function () {
$(window).scroll(function () {
if ($(this).scrollTop() != 0) {
$('#toTop').fadeIn();
} else {
$('#toTop').fadeOut();
}
});
$('#toTop').click(function () {
$('body,html').animate({ scrollTop: 0 }, 800);
});
});

//============================ accordion
$(document).ready(function() {
  $(".accordion section h1").click(function(e) {
    $(this).parents().siblings("section").addClass("ac_hidden");
    $(this).parents("section").toggleClass("ac_hidden");
    e.preventDefault();
  });
});

//============================ div hide and show banner flip
$(".cros").click(function(){
  $(".flipcardscontainer").toggleClass('ms');
}); 


$(document).ready( function(){
$('.cros').click( function() {
if($('.cros img').attr('src')=='images/arrow02.png'){
$('.cros img').attr('src','images/arrow.png');
}else{ $('.cros img').attr('src','images/arrow02.png'); }
});
}); 



//============================== scroll header 
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 200) {
        $("#header-wrap").css("position","fixed").addClass('fix');
    } else {
        $("#header-wrap").css("position","").removeClass('fix');
		$("#header-wrap").stop().css('top','-100px').animate({'top':'0px'},500);
    }
});
