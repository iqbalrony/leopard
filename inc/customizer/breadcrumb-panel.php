<?php
/**
 * Leopard Footer Settings panel at Theme Customizer
 *
 * @package Leopard
 * @since 1.0.0
 */

add_action('customize_register', 'lprd_breadcrumb_settings_register');

function lprd_breadcrumb_settings_register($wp_customize) {


	/**
	 * Add Additional Settings Panel
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_panel(
		'lprd_breadcrumb_settings_panel',
		array(
			'priority' => 30,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Breadcrumb Settings', 'leopard'),
		)
	);

	/**
	 * Breadcrumb
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_breadcrumb_section',
		array(
			'title' => __('Breadcrumb', 'leopard'),
			'description' => __('Show/Hide option for breadcrumb.', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_breadcrumb_settings_panel',
		)
	);

	$wp_customize->add_setting(
		'lprd_breadcrumb_on_off',
		array(
			'default' => 'show',
			'transport'  => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_switch_option',
		)
	);
	$wp_customize->add_control(
		'lprd_breadcrumb_on_off',
		array(
			'type' => 'select',
			'label'     => esc_html__( 'Breadcrumb Area', 'leopard' ),
			'description'   => esc_html__( 'Show/Hide option for breadcrumb.', 'leopard' ),
			'section' => 'lprd_breadcrumb_section',
			'priority' => 10,
			'choices'   => array(
				'show'  => esc_html__( 'Show', 'leopard' ),
				'hide'  => esc_html__( 'Hide', 'leopard' )
			),
		)
	);

	/**
	 * Breadcrumb Background
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_breadcrumb_bg_section',
		array(
			'title' => __('Breadcrumb Background', 'leopard'),
			'description' => __('Set the Breadcrumb background.', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_breadcrumb_settings_panel',
			'active_callback' => 'lprd_is_breadcrumb_show',
		)
	);

	$wp_customize->add_setting(
		'lprd_breadcrumb_bg_clr',
		array(
			'default' => '#f3f5fb',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_breadcrumb_bg_clr',
			array(
				'label' => __('Breadcrumb Background Color', 'leopard'),
				'section' => 'lprd_breadcrumb_bg_section',
				'priority' => 10,
			))
	);

	$wp_customize->add_setting(
		'lprd_breadcrumb_bg_img',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'lprd_breadcrumb_bg_img',
			array(
				'label'      => __( 'Breadcrumb Background Image', 'leopard' ),
				'section'    => 'lprd_breadcrumb_bg_section',
				'priority'   => 10,
			) )
	);

	/**
	 * Breadcrumb Text Color
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_breadcrumb_clr_section',
		array(
			'title' => __('Breadcrumb Color', 'leopard'),
			'description' => __('Set the Breadcrumb Color.', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_breadcrumb_settings_panel',
			'active_callback' => 'lprd_is_breadcrumb_show',
		)
	);

	$wp_customize->add_setting(
		'lprd_breadcrumb_txt_clr',
		array(
			'default' => '#0c1428',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_breadcrumb_txt_clr',
			array(
				'label' => __('Breadcrumb Text Color', 'leopard'),
				'section' => 'lprd_breadcrumb_clr_section',
				'priority' => 10,
			))
	);

	$wp_customize->add_setting(
		'lprd_breadcrumb_txt_hvr_clr',
		array(
			'default' => '#8BA4F9',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_breadcrumb_txt_hvr_clr',
			array(
				'label' => __('Breadcrumb Anchor Hover Color', 'leopard'),
				'section' => 'lprd_breadcrumb_clr_section',
				'priority' => 10,
			))
	);




} //Footer panel close
