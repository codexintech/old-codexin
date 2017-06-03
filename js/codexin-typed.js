(function( $ ) {
	$(".element").typed({
		stringsElement: document.getElementById('typed-strings'),
		typeSpeed: 200,
		backDelay: 500,
		loop: true,
        contentType: 'html', // or text
        // defaults to null for infinite loop
        loopCount: null,
    });
})(jQuery);