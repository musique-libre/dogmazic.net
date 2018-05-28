$(function(){
	$('header #loupe img').hover(function(){
		$(this).attr('src','assets/img/loupe_grise.png');	
	},function(){
		$(this).attr('src','assets/img/loupe_blanche.png');
	});
	$('header #logo_don').hover(function(){
		$(this).attr('src','assets/img/don_gris.png');	
	},function(){
		$(this).attr('src','assets/img/don.png');
	});
	$('header #logo_mobile').hover(function(){
		$(this).attr('src','assets/img/smartphone_gris.png');	
	},function(){
		$(this).attr('src','assets/img/smartphone.png');
	});
});