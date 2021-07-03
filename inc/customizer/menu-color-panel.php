<?php
/**
 * Leopard Menu Color panel at Theme Customizer
 *
 * @package Leopard
 * @since 1.0.0
 */

add_action('customize_register', 'leopard_menu_color_register');

function leopard_menu_color_register($wp_customize) {


	/**
	 * Add Additional Settings Panel
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_panel(
		'lprd_menu_color_panel',
		array(
			'priority' => 105,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Menus Color', 'leopard'),
		)
	);

	/**
	 * Menu Color
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_menu_color_section',
		array(
			'title' => __('Menus Color', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_menu_color_panel',
		)
	);
	//menu text color
	$wp_customize->add_setting(
		'lprd_menu_text_color',
		array(
			'default' => '#494f5e',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_menu_text_color',
			array(
				'label' => __('Menu text color', 'leopard'),
				'section' => 'lprd_menu_color_section',
				'priority' => 10,
			))
	);
	//menu text hover color
	$wp_customize->add_setting(
		'lprd_menu_text_hover_color',
		array(
			'default' => '#8ba4f9',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_menu_text_hover_color',
			array(
				'label' => __('Menu text hover color', 'leopard'),
				'section' => 'lprd_menu_color_section',
				'priority' => 10,
			))
	);
	//dropdown menu bg
	$wp_customize->add_setting(
		'lprd_drop_menu_bg',
		array(
			'default' => '#ffffff',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_drop_menu_bg',
			array(
				'label' => __('Dropdown menu background', 'leopard'),
				'section' => 'lprd_menu_color_section',
				'priority' => 10,
			))
	);


	/**
	 * Mobile menu color
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_mobile_menu_color_section',
		array(
			'title' => __('Mobile Menu Color', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_menu_color_panel',
		)
	);
	//Burger & cross Icon color
	$wp_customize->add_setting(
		'lprd_burger_icon_color',
		array(
			'default' => '#494f5e',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_burger_icon_color',
			array(
				'label' => __('Burger & Cross Icon color', 'leopard'),
				'section' => 'lprd_mobile_menu_color_section',
				'priority' => 10,
			))
	);
	//Mobile menu bg
	$wp_customize->add_setting(
		'lprd_mobile_menu_bg',
		array(
			'default' => '#ffffff',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_mobile_menu_bg',
			array(
				'label' => __('Mobile menu background', 'leopard'),
				'section' => 'lprd_mobile_menu_color_section',
				'priority' => 10,
			))
	);
	//Mobile menu text color
	$wp_customize->add_setting(
		'lprd_mobile_menu_text_color',
		array(
			'default' => '#494f5e',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_mobile_menu_text_color',
			array(
				'label' => __('Menu text color', 'leopard'),
				'section' => 'lprd_mobile_menu_color_section',
				'priority' => 10,
			))
	);
	//Mobile menu text hover color
	$wp_customize->add_setting(
		'lprd_mobile_menu_text_hover_color',
		array(
			'default' => '#8ba4f9',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_mobile_menu_text_hover_color',
			array(
				'label' => __('Menu text hover color', 'leopard'),
				'section' => 'lprd_mobile_menu_color_section',
				'priority' => 10,
			))
	);



} //shop panel close
