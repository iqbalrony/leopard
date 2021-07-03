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
function leopard_customize_register($wp_customize) {
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

//	$wp_customize->remove_control("custom_logo");


	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', array(
			'selector' => '.site-title a',
			'render_callback' => 'pws_customize_partial_blogname',
		));
		$wp_customize->selective_refresh->add_partial('blogdescription', array(
			'selector' => '.site-description',
			'render_callback' => 'pws_customize_partial_blogdescription',
		));
	}


}

add_action('customize_register', 'leopard_customize_register');


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function leopard_customize_preview_js() {
	wp_enqueue_script('leopard-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}

// add_action('customize_preview_init', 'leopard_customize_preview_js');


/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function leopard_customize_backend_scripts() {

	wp_enqueue_style('leopard_admin_customizer_style', get_template_directory_uri() . '/assets/css/leopard-customizer-style.css');
	wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/assets/css/materialdesignicons.min.css', array(), null);

	wp_enqueue_script('leopard_admin_customizer', get_template_directory_uri() . '/assets/js/leopard-customizer-controls.js', array('jquery', 'customize-controls'), '20180416', true);
}

// add_action('customize_controls_enqueue_scripts', 'leopard_customize_backend_scripts', 10);


/**
 * Load required files for customizer section
 *
 * @since 1.0.0
 */

get_template_part('inc/customizer/css_class_of_icon');         // css class of icon
get_template_part('inc/customizer/custom-classes');         // Custom Classes
get_template_part('inc/customizer/general-panel');          // General Settings
get_template_part('inc/customizer/header-panel');          // Header Settings
get_template_part('inc/customizer/breadcrumb-panel');      // breadcrumb Settings
if (class_exists('WooCommerce')){
	get_template_part('inc/customizer/shop-panel');      // shop Settings
}
get_template_part('inc/customizer/enu-color-panel');       	// menu color Settings
get_template_part('inc/customizer/footer-panel');           // Footer Settings
get_template_part('inc/customizer/homepage-template');           // Homepage Template Settings

get_template_part('inc/customizer/customizer-sanitize');    // Customizer Sanitize
