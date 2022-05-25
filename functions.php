<?php
/**
 * Leopard functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Leopard
 */

if ( ! defined( 'LPRD_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'LPRD_VERSION', '1.0.2' );
}


/**
 * Theme Setup
 */
require_once get_template_directory() . '/inc/theme-setup.php';

/**
 * Theme Scripts
 */
require_once get_template_directory() . '/inc/theme-scripts.php';

/**
 * Theme Functions
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer/customizer.php';
