$(function(){
	$('header #loupe img').hover(function(){
		$(this).attr('src','assets/img/loupe_grise.png');	
	},function(){
		$(this).attr('src','assets/img/loupe_blanche.png');
	});
});