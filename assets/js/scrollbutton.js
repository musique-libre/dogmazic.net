$(function(){
	$('#bouton_don').click(function(){
		$('html, body').animate({
        scrollTop: $("#don").offset().top
        });
	});
});