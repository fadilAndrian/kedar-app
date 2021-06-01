$('.page-scroll').on('click', function(e){

	var href = $(this).attr('href');
	var elemenHref = $(href);
	
	// $('body').scrollTop(elemenHref.offset().top);
	console.log($('body').scrollTop());
	// $('body').animate({
	// 	scrollTop: elemenHref.offset().top
	// }, 1000);

	// e.preventDefault();
}); 