$(function(){
	$('main > header #apps_mobiles, #logo_mobile').click(function(){
		$('#apps_mobiles_popup').css('display','block').css('top','30vh').css('opacity','0');
		$('#apps_mobiles_popup').animate({
			top: '50vh',
			opacity: '1'
		});
	});

	$('#apps_mobiles_popup button').click(function(){
		$('#apps_mobiles_popup').animate({
			top: '30vh',
			opacity: '0'
		}, function(){
			$(this).css('display','none');
		});
	});
});