/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

	// Color Scheme
	wp.customize( 'lprd_color_white', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' !== to ) {
				$('body' ).css( {
					'--color-white': to,
				} );
			}
		} );
	} );

	wp.customize( 'lprd_color_white_lilac', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' !== to ) {
				$('body' ).css( {
					'--color-white-lilac': to,
				} );
			}
		} );
	} );

	wp.customize( 'lprd_color_porcelain', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' !== to ) {
				$('body' ).css( {
					'--color-porcelain': to,
				} );
			}
		} );
	} );

	wp.customize( 'lprd_color_french_gray', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' !== to ) {
				$('body' ).css( {
					'--color-french-gray': to,
				} );
			}
		} );
	} );

	wp.customize( 'lprd_color_trout', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' !== to ) {
				$('body' ).css( {
					'--color-trout': to,
				} );
			}
		} );
	} );

	wp.customize( 'lprd_color_firefly', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' !== to ) {
				$('body' ).css( {
					'--color-firefly': to,
				} );
			}
		} );
	} );

	wp.customize( 'lprd_color_manatee', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' !== to ) {
				$('body' ).css( {
					'--color-manatee': to,
				} );
			}
		} );
	} );

	wp.customize( 'lprd_color_malibu', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' !== to ) {
				$('body' ).css( {
					'--color-malibu': to,
				} );
			}
		} );
	} );

	wp.customize( 'lprd_color_outrageous_orange', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' !== to ) {
				$('body' ).css( {
					'--color-outrageous-orange': to,
				} );
			}
		} );
	} );

}( jQuery ) );
