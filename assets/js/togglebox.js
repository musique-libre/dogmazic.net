$(function(){
	$('#commentsAndForum .box_title').click(function(){
		var show = $(this).parent().children('.box_content').attr('data_show');
		if(show == 'no'){
			$(this).parent().children('.box_content').attr('data_show','yes');
			toggle('down',$(this));
		}else{
			$(this).parent().children('.box_content').attr('data_show','no');
			toggle('up',$(this));
		}
	});
});

function toggle(sens,element)
	{
		var step = 0;
		var y = 0;
		var I = setInterval(tog,10);		
		function tog()
		{
			if(step>=135){
				clearInterval(I);
			}else{
				step+=5;
				y = step*50/135;
				if(sens == 'down'){
					element.find('.box_plus').css('transform','rotate(-'+step+'deg)');
					element.parent().children('.box_content').css('max-height',y+'em');
					console.log(element.parent().children('.box_content').css('max-height'));
				}else{
					element.find('.box_plus').css('transform','rotate(-'+(135-step)+'deg)');
					element.parent().children('.box_content').css('max-height',50-y+'em');
					console.log(element.parent().children('.box_content').css('max-height'));				
				}
				
			}
		}	
	}