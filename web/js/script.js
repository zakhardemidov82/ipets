$(document).ready(function() {
	console.log( "ready!" );

	/*
	//маска ввода
	$("input[name='tel']").mask("+7 (999) 999-99-99");
	*/
	//Слайдер отзывов
	$('.header-slider').slick({
		infinite: true,
		slidesToShow:1,
		slidesToScroll:1,
		arrows:false,
		dots:true
	});
	
	//Отправка формы 
	$('.ajaxform').on('submit',(function(e) {
		e.preventDefault();
		
		var	submit_button = $(this).find('button');
		var formData = new FormData(this);
		var url = $(this).attr('action');
		
		$.ajax({
			type:'POST',
			url: url,
			data: formData, 
			cache:false, 
			contentType: false, 
			processData: false, 
			beforeSend: function () {
                submit_button.addClass('process');
            },
			
			success:function(data){
				submit_button.removeClass('process');
				$('body').hermesNotification({'success':'Message send', 'successMsg':'Message send text'});
				$('.lity-close').trigger('click');
			},
			error:function(data){
				$('body').hermesNotification('error', {'error':'Message send error', 'errorMsg':'Message send error text'});
				$('body').hermesNotification('error');
			}
		});
	}));
	
	//колонки одинаковой высоты
	var tallest = 0;
	$('.scope-row-text').each(function() {
		thisHeight = $(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	$('.scope-row-text').height(tallest);
});




