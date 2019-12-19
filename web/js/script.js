$(document).ready(function() {
	console.log( "ready!" );

	/*
	//маска ввода
	$("input[name='tel']").mask("+7 (999) 999-99-99");
	
	//Селект
	$('select').niceSelect();
	
	//Всплывающие подсказки
    $.tips({
        action: 'hover',
        element: '.hover',
    });
	*/
	//Слайдер отзывов
	$('.header-slider').slick({
		infinite: true,
		slidesToShow:1,
		slidesToScroll:1,
		arrows:false,
		dots:true
	});
	
});

//Плавная прокрутка к якорям
$(function(){
	$("a[href*=#]:not([href=#]):not([data-lity])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=$(this.hash);if(t=t.length?t:$("[name="+this.hash.slice(1)+"]"),t.length)return $("html,body").animate({scrollTop:t.offset().top},1000),!1}})
});
