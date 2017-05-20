function(jQuery) {
	"use strict";
	// Home Background Image - Image Control
	wp.customize( 'vigilant_home_section', function( value ) {
		value.bind( function( to ) {
			$( '#home-hero' ).css( ‘background-image’, ‘url( ‘ + to + ‘)’ );
		} );
	});
})(jQuery);
