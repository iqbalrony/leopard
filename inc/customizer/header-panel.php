<?php
/**
 * Leopard Header Settings panel at Theme Customizer
 *
 * @package Leopard
 * @since 1.0.0
 */

add_action( 'customize_register', 'lprd_header_settings_register' );

function lprd_header_settings_register( $wp_customize ) {


	/**
     * Add General Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel('lprd_header_settings_panel',array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Header Settings', 'leopard' ),
    ));


    $wp_customize->get_section('header_image')->panel = 'lprd_header_settings_panel';
//    $wp_customize->get_section('header_image')->title = 'Header Background Image';
    $wp_customize->get_section('header_image')->priority = 3;



	/**
	 * Header Logo and background section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_header_logo_and_bg_section',
		array(
			'title'         => __( 'Header Logo & Background', 'leopard' ),
			'description'   => __( 'Set the settings of header with background.', 'leopard' ),
			'priority'      => 56,
			'panel'         => 'lprd_header_settings_panel',
		)
	);

	$wp_customize->get_control('custom_logo')->section = 'lprd_header_logo_and_bg_section';
	$wp_customize->add_setting(
		'lprd_header_bg_clr',
		array(
			'default' => '#ffffff',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_header_bg_clr',
			array(
				'label'      => __( 'Header Background Color', 'leopard' ),
				'section'    => 'lprd_header_logo_and_bg_section',
				'priority'   => 20,
			) )
	);
	$wp_customize->add_setting(
		'lprd_header_border_clr',
		array(
			'default' => '#f3f4f5',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_header_border_clr',
			array(
				'label'      => __( 'Header Border Color', 'leopard' ),
				'section'    => 'lprd_header_logo_and_bg_section',
				'priority'   => 20,
			) )
	);


} // header panel close
