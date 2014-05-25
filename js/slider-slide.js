( function( $ ) {
    var body    = $( 'body' ),
		_window = $( window );
// Initialize Featured Content slider.
	_window.load( function() {
		if ( body.is( '.slider' ) ) {
			$( '.featured-content' ).flexslider( {
				selector: '.featured-content-inner > article',
				controlsContainer: '.featured-content',
				slideshow: true,
				pauseOnHover: true,
				animation: 'slide',
				slideshowSpeed: 5000,
				namespace: 'slider-',
			} );
		}
	} );
	
} )( jQuery );