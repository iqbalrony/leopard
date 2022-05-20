<?php
/**
 * Leopard Theme Customizer
 *
 * @package Leopard
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lprd_customize_register($wp_customize) {
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', array(
			'selector' => '.site-title a',
			'render_callback' => 'lprd_customize_partial_blogname',
		));
		$wp_customize->selective_refresh->add_partial('blogdescription', array(
			'selector' => '.site-description',
			'render_callback' => 'lprd_customize_partial_blogdescription',
		));
	}

}

add_action('customize_register', 'lprd_customize_register');


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lprd_customize_preview_js() {
	wp_enqueue_script('leopard-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), LPRD_VERSION, true);
}

add_action('customize_preview_init', 'lprd_customize_preview_js');


/**
 * Load required files for customizer section
 *
 * @since 1.0.0
 */

get_template_part('inc/customizer/general-panel');          // General Settings
get_template_part('inc/customizer/header-panel');          // Header Settings
get_template_part('inc/customizer/breadcrumb-panel');      // breadcrumb Settings
get_template_part('inc/customizer/footer-panel');           // Footer Settings
get_template_part('inc/customizer/customizer-sanitize');    // Customizer Sanitize
