<?php
/**
 * Leopard Footer Settings panel at Theme Customizer
 *
 * @package Leopard
 * @since 1.0.0
 */

add_action( 'customize_register', 'lprd_footer_settings_register' );

function lprd_footer_settings_register( $wp_customize ) {


	/**
     * Add Additional Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'lprd_footer_settings_panel',
	    array(
	        'priority'       => 130,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Footer Settings', 'leopard' ),
	    )
    );

	/**
	 * Footer Background
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_footer_bg_section',
		array(
			'title'         => __( 'Footer Background', 'leopard' ),
			'description'   => __( 'Set the footer background.', 'leopard' ),
			'priority'      => 5,
			'panel'         => 'lprd_footer_settings_panel',
		)
	);

	$wp_customize->add_setting(
		'lprd_footer_bg_clr',
		array(
			'default' => '#f3f5fb',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lprd_footer_bg_clr',
			array(
				'label'      => __( 'Footer Background Color', 'leopard' ),
				'section'    => 'lprd_footer_bg_section',
				'priority'   => 10,
			) )
	);

	$wp_customize->add_setting(
		'lprd_footer_bg_img',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'lprd_footer_bg_img',
			array(
				'label'      => __( 'Footer Background Image', 'leopard' ),
				'section'    => 'lprd_footer_bg_section',
				'priority'   => 10,
			) )
	);

    /**
	 * Copyright Text Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'lprd_footer_copyright_section',
        array(
            'title'		=> esc_html__( 'Copyright Text', 'leopard' ),
            'panel'     => 'lprd_footer_settings_panel',
            'priority'  => 5,
        )
    );
    $wp_customize->add_setting(
        'lprd_copyright_txt',
        array(
            'default' => '',
            'transport'    => 'refresh',
            'sanitize_callback' => 'lprd_copyright_html'
        )
    );
    $wp_customize->add_control(
            'lprd_copyright_txt',
            array(
                'type'      => 'textarea',
                'label'     => esc_html__( 'Footer Copyright Text', 'leopard' ),
                'description'   => esc_html__( 'Set the copyright text.', 'leopard' ),
                'section'   => 'lprd_footer_copyright_section',
                'priority'  => 5,
            )

    );


    } //Footer panel close
