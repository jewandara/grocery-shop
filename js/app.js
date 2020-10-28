$(window).on( 'load', function() {
	$(".book_preload").delay(2000).fadeOut(200);
	$(".book").on('click', function() { $(".book_preload").fadeOut(200); });
});






/*$(document).keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){ }
});*/






$(document).ready(function(){
    alartCloseBtn();
});






window.onscroll = function() {
  topMenuTextIntroScroll();
};






window.onclick = function(event) { 
  windowOnClickClosePopUp();
}