<?php
/**
 * Leopard General Settings panel at Theme Customizer
 *
 * @package Leopard
 * @since 1.0.0
 */

add_action('customize_register', 'lprd_general_settings_register');

function lprd_general_settings_register($wp_customize) {

	$wp_customize->get_section('title_tagline')->panel = 'lprd_general_settings_panel';
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_section('title_tagline')->priority = '5';
	$wp_customize->get_section('colors')->panel = 'lprd_general_settings_panel';
	$wp_customize->get_section('colors')->priority = '10';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
	$wp_customize->get_section('background_image')->panel = 'lprd_general_settings_panel';
	$wp_customize->get_section('background_image')->priority = '15';
	$wp_customize->get_section('static_front_page')->panel = 'lprd_general_settings_panel';
	$wp_customize->get_section('static_front_page')->priority = '20';

	/**
	 * Add General Settings Panel
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_panel(
		'lprd_general_settings_panel',
		array(
			'priority' => 5,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('General Settings', 'leopard'),
		)
	);


	/*-----------------------------------------------------------------------------------------------------------------------*/
	/**
	 * Preloader section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_preloader_section',
		array(
			'title' => __('Preloader', 'leopard'),
			'description' => __('Show/Hide option for preloader.', 'leopard'),
			'priority' => 55,
			'panel' => 'lprd_general_settings_panel',
		)
	);

	$wp_customize->add_setting(
		'lprd_preloader_on_off',
		array(
			'default' => 'show',
			'transport'  => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_switch_option',
		)
	);
	$wp_customize->add_control(
		'lprd_preloader_on_off',
		array(
			'type' => 'select',
			'label'    => esc_html__( 'Preloader', 'leopard' ),
			// 'description' => esc_html__('Show/Hide option for preloader.', 'leopard'),
			'section' => 'lprd_preloader_section',
			'priority' => 10,
			'choices'   => array(
				'show'  => esc_html__( 'Show', 'leopard' ),
				'hide'  => esc_html__( 'Hide', 'leopard' )
			),
		)
	);


	/**
	 * Layout Settings
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_layout_section',
		array(
			'title'     => esc_html__( 'Layout Settings', 'leopard' ),
			'panel'     => 'lprd_general_settings_panel',
			'priority'  => 5,
		)
	);

	$wp_customize->add_setting(
		'lprd_page_layout',
		array(
			'default'           => 'right',
			'sanitize_callback' => 'lprd_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'lprd_page_layout',
		array(
			'type' => 'select',
			'label'    => esc_html__( 'Sidebars', 'leopard' ),
			'description' => esc_html__( 'Choose sidebar from available layouts', 'leopard' ),
			'section' => 'lprd_layout_section',
			'priority' => 10,
			'choices' => [
				'left' => esc_html__( 'Left Sidebar', 'leopard' ),
				'right' => esc_html__( 'Right Sidebar', 'leopard' ),
				'without' => esc_html__( 'Without Sidebar', 'leopard' ),
			],
		)
	);

	/**
	 * Color Scheme
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_color_scheme_section',
		array(
			'title' => __('Color Scheme', 'leopard'),
			'description' => __('Set the color scheme.', 'leopard'),
			'priority' => 10,
			'panel' => 'lprd_general_settings_panel',
		)
	);

	//--color-white
	$wp_customize->add_setting(
		'lprd_color_white',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_color_white',
			array(
				'label' => __('White Color', 'leopard'),
				'section' => 'lprd_color_scheme_section',
				'priority' => 10,
			))
	);
	//--color-white-lilac
	$wp_customize->add_setting(
		'lprd_color_white_lilac',
		array(
			'default' => '#F3F5FB',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_color_white_lilac',
			array(
				'label' => __('White Lilac Color', 'leopard'),
				'section' => 'lprd_color_scheme_section',
				'priority' => 10,
			))
	);
	//--color-porcelain
	$wp_customize->add_setting(
		'lprd_color_porcelain',
		array(
			'default' => '#F3F4F5',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_color_porcelain',
			array(
				'label' => __('Porcelain Color', 'leopard'),
				'section' => 'lprd_color_scheme_section',
				'priority' => 10,
			))
	);
	//--color-french-gray
	$wp_customize->add_setting(
		'lprd_color_french_gray',
		array(
			'default' => '#C7C7CF',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_color_french_gray',
			array(
				'label' => __('French Color', 'leopard'),
				'section' => 'lprd_color_scheme_section',
				'priority' => 10,
			))
	);
	//--color-trout
	$wp_customize->add_setting(
		'lprd_color_trout',
		array(
			'default' => '#494F5E',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_color_trout',
			array(
				'label' => __('Trout Color', 'leopard'),
				'section' => 'lprd_color_scheme_section',
				'priority' => 10,
			))
	);
	//--color-firefly
	$wp_customize->add_setting(
		'lprd_color_firefly',
		array(
			'default' => '#0C1428',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_color_firefly',
			array(
				'label' => __('Firefly Color', 'leopard'),
				'section' => 'lprd_color_scheme_section',
				'priority' => 10,
			))
	);
	//--color-manatee
	$wp_customize->add_setting(
		'lprd_color_manatee',
		array(
			'default' => '#8F90A0',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_color_manatee',
			array(
				'label' => __('Manatee Color', 'leopard'),
				'section' => 'lprd_color_scheme_section',
				'priority' => 10,
			))
	);
	//--color-malibu
	$wp_customize->add_setting(
		'lprd_color_malibu',
		array(
			'default' => '#8BA4F9',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_color_malibu',
			array(
				'label' => __('Malibu Color', 'leopard'),
				'section' => 'lprd_color_scheme_section',
				'priority' => 10,
			))
	);
	//--color-outrageous-orange
	$wp_customize->add_setting(
		'lprd_color_outrageous_orange',
		array(
			'default' => '#FE5B36',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_color_outrageous_orange',
			array(
				'label' => __('Outrageous Orange Color', 'leopard'),
				'section' => 'lprd_color_scheme_section',
				'priority' => 10,
			))
	);



} // General panel closed
