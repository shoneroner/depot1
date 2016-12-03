jQuery(document).ready(function(){

	$('.item a').mouseover(function(){
		$(this).parent().parent('.item').addClass('selected');
	}).mouseout(function() {
		$(this).parent().parent('.item').removeClass('selected');
	});

});