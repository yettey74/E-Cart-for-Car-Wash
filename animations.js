function changeSlide() {
	
	var $current = $('#slideshow img.current');
	
	if($current.length == 0){
		$current = $('#slideshow img:last');
	}
	
	if($current.next().length){
		var $next = $current.next();
	}else{
		var $next = $('#slideshow img:first');
	}
	//var $next = $current.next().length ? $current.next() : $('slideshow img:first');
	//alert($current.next().length);
	
	$current.addClass('prev');
	$next.css({opacity:0.0}).addClass('current').animate({opacity:1.0}, 2000, function(){$current.removeClass('current prev');});
}

$(function(){

	setInterval("changeSlide()", 4400);	
	
	//menu text fading animation
	$("#menu a").hover (function() {
		$(this).animate({ color: "#c94066"}, 10);
	}, function(){
		$(this).animate({ color: "#a09fa4"}, 200);	
	});
	
});