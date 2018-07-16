$(function(){
	/* Limitation de la hauteur des encarts 'commentaires' et 'forum' à sa valeur de base
	* 	pour éviter le déroulement des 2 boîtes en cas d'alignement horizontal (responsive)
	*/ 
	var box_height = $('#commentsAndForum #forum').outerHeight();		
	$('#commentsAndForum').children(':not(#menuMusique)').css('max-height',box_height+'px');

	$('#commentsAndForum .box_title').click(function(){
		var show = $(this).parent().children('.box_content').attr('data_show');
		if(show == 'no'){
			closeAll(box_height);
			$(this).parent().children('.box_content').attr('data_show','yes');
			toggle('down',$(this),box_height);
		}else{
			$(this).parent().children('.box_content').attr('data_show','no');
			toggle('up',$(this),box_height);
		}
	});
});

function toggle(sens,element,box_height){
	var step = 0;
	var y = 0;
	var I = setInterval(tog,10);		
	function tog()
	{
		if(step>=135){
			clearInterval(I);
			if (sens == 'up') 
			{
				element.parent().css('max-height',box_height+'px');
			}
		}else{
			step+=5;
			y = step*50/135;
			if(sens == 'down'){
				element.find('.box_plus').css('transform','rotate(-'+step+'deg)');
				element.parent().children('.box_content').css('max-height',y+'em');
				element.parent().css('max-height','none');
			}else{
				element.find('.box_plus').css('transform','rotate(-'+(135-step)+'deg)');
				element.parent().children('.box_content').css('max-height',50-y+'em');
			}
			
		}
	}	
}

function closeAll(box_height){
	$('#commentsAndForum .box_content').each(function(){
		let showAttr = $(this).attr('data_show');
		if(showAttr == 'yes'){
			$(this).attr('data_show','no');
			toggle('up',$(this),box_height);
		}
	});
}