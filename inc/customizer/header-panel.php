<?php
/**
 * Leopard Header Settings panel at Theme Customizer
 *
 * @package Leopard
 * @since 1.0.0
 */

add_action( 'customize_register', 'leopard_header_settings_register' );

function leopard_header_settings_register( $wp_customize ) {


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

	/**
	 * Header Button section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_header_button_section',
		array(
			'title'         => __( 'Header Button', 'leopard' ),
			'description'   => __( 'Set the header button setting.', 'leopard' ),
			'priority'      => 56,
			'panel'         => 'lprd_header_settings_panel',
		)
	);

	//search button
	$wp_customize->add_setting(
		'lprd_header_search',
		array(
			'default' => 'show',
			'transport'  => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_switch_option',
		)
	);
	$wp_customize->add_control( new Leopard_Customize_Switch_Control(
			$wp_customize,
			'lprd_header_search',
			array(
				'type'      => 'switch',
				'label'     => esc_html__( 'Search Button', 'leopard' ),
				'description'   => esc_html__( 'Show/Hide option for header search button.', 'leopard' ),
				'section'   => 'lprd_header_button_section',
				'choices'   => array(
					'show'  => esc_html__( 'Show', 'leopard' ),
					'hide'  => esc_html__( 'Hide', 'leopard' )
				),
				'priority'  => 10,
			)
		)
	);

	//shop button
	$wp_customize->add_setting(
		'lprd_header_shop',
		array(
			'default' => 'show',
			'transport'  => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_switch_option',
		)
	);
	$wp_customize->add_control( new Leopard_Customize_Switch_Control(
			$wp_customize,
			'lprd_header_shop',
			array(
				'type'      => 'switch',
				'label'     => esc_html__( 'Shop Button', 'leopard' ),
				'description'   => esc_html__( 'Show/Hide option for header shop button.', 'leopard' ),
				'section'   => 'lprd_header_button_section',
				'choices'   => array(
					'show'  => esc_html__( 'Show', 'leopard' ),
					'hide'  => esc_html__( 'Hide', 'leopard' )
				),
				'priority'  => 10,
				'active_callback' => 'lprd_is_shop_show',
			)
		)
	);

	/**
	 * Header Social section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_header_social_section',
		array(
			'title'         => __( 'Header Social Icon', 'leopard' ),
			'description'   => __( 'Set the header social icon. Must have set both input field to show icon.', 'leopard' ),
			'priority'      => 56,
			'panel'         => 'lprd_header_settings_panel',
		)
	);
	//social icon 1
	$wp_customize->add_setting(
		'lprd_social_icon_1',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text_attr',
		)
	);
	$wp_customize->add_control(
		new Leopard_Customize_Icon_Control(
			$wp_customize,
			'lprd_social_icon_1',
			array(
				'type'      => 'icon',
				'label' => __('Social Icon 1', 'leopard'),
				'section' => 'lprd_header_social_section',
				'priority' => 10,
			))
	);
	//social link 1
	$wp_customize->add_setting(
		'lprd_social_link_1',
		array(
			'default' => '',
			'transport'  => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'lprd_social_link_1',
		array(
			'type'      => 'url',
			'label'     => __('Social Link 1', 'leopard'),
			'section'   => 'lprd_header_social_section',
			'priority'  => 10
		)
	);
	//social icon 2
	$wp_customize->add_setting(
		'lprd_social_icon_2',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text_attr',
		)
	);
	$wp_customize->add_control(
		new Leopard_Customize_Icon_Control(
			$wp_customize,
			'lprd_social_icon_2',
			array(
				'type'      => 'icon',
				'label' => __('Social Icon 2', 'leopard'),
				'section' => 'lprd_header_social_section',
				'priority' => 10,
			))
	);
	//social link 2
	$wp_customize->add_setting(
		'lprd_social_link_2',
		array(
			'default' => '',
			'transport'  => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'lprd_social_link_2',
		array(
			'type'      => 'url',
			'label'     => __('Social Link 2', 'leopard'),
			'section'   => 'lprd_header_social_section',
			'priority'  => 10
		)
	);
	//social icon 3
	$wp_customize->add_setting(
		'lprd_social_icon_3',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text_attr',
		)
	);
	$wp_customize->add_control(
		new Leopard_Customize_Icon_Control(
			$wp_customize,
			'lprd_social_icon_3',
			array(
				'type'      => 'icon',
				'label' => __('Social Icon 3', 'leopard'),
				'section' => 'lprd_header_social_section',
				'priority' => 10,
			))
	);
	//social link 3
	$wp_customize->add_setting(
		'lprd_social_link_3',
		array(
			'default' => '',
			'transport'  => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'lprd_social_link_3',
		array(
			'type'      => 'url',
			'label'     => __('Social Link 3', 'leopard'),
			'section'   => 'lprd_header_social_section',
			'priority'  => 10
		)
	);
	//social icon 4
	$wp_customize->add_setting(
		'lprd_social_icon_4',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text_attr',
		)
	);
	$wp_customize->add_control(
		new Leopard_Customize_Icon_Control(
			$wp_customize,
			'lprd_social_icon_4',
			array(
				'type'      => 'icon',
				'label' => __('Social Icon 4', 'leopard'),
				'section' => 'lprd_header_social_section',
				'priority' => 10,
			))
	);
	//social link 4
	$wp_customize->add_setting(
		'lprd_social_link_4',
		array(
			'default' => '',
			'transport'  => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'lprd_social_link_4',
		array(
			'type'      => 'url',
			'label'     => __('Social Link 4', 'leopard'),
			'section'   => 'lprd_header_social_section',
			'priority'  => 10
		)
	);
	//social icon 5
	$wp_customize->add_setting(
		'lprd_social_icon_5',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text_attr',
		)
	);
	$wp_customize->add_control(
		new Leopard_Customize_Icon_Control(
			$wp_customize,
			'lprd_social_icon_5',
			array(
				'type'      => 'icon',
				'label' => __('Social Icon 5', 'leopard'),
				'section' => 'lprd_header_social_section',
				'priority' => 10,
			))
	);
	//social link 5
	$wp_customize->add_setting(
		'lprd_social_link_5',
		array(
			'default' => '',
			'transport'  => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'lprd_social_link_5',
		array(
			'type'      => 'url',
			'label'     => __('Social Link 5', 'leopard'),
			'section'   => 'lprd_header_social_section',
			'priority'  => 10
		)
	);
	//social icon 6
	$wp_customize->add_setting(
		'lprd_social_icon_6',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text_attr',
		)
	);
	$wp_customize->add_control(
		new Leopard_Customize_Icon_Control(
			$wp_customize,
			'lprd_social_icon_6',
			array(
				'type'      => 'icon',
				'label' => __('Social Icon 6', 'leopard'),
				'section' => 'lprd_header_social_section',
				'priority' => 10,
			))
	);
	//social link 6
	$wp_customize->add_setting(
		'lprd_social_link_6',
		array(
			'default' => '',
			'transport'  => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'lprd_social_link_6',
		array(
			'type'      => 'url',
			'label'     => __('Social Link 6', 'leopard'),
			'section'   => 'lprd_header_social_section',
			'priority'  => 10
		)
	);
	//social icon 7
	$wp_customize->add_setting(
		'lprd_social_icon_7',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text_attr',
		)
	);
	$wp_customize->add_control(
		new Leopard_Customize_Icon_Control(
			$wp_customize,
			'lprd_social_icon_7',
			array(
				'type'      => 'icon',
				'label' => __('Social Icon 7', 'leopard'),
				'section' => 'lprd_header_social_section',
				'priority' => 10,
			))
	);
	//social link 7
	$wp_customize->add_setting(
		'lprd_social_link_7',
		array(
			'default' => '',
			'transport'  => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'lprd_social_link_7',
		array(
			'type'      => 'url',
			'label'     => __('Social Link 7', 'leopard'),
			'section'   => 'lprd_header_social_section',
			'priority'  => 10
		)
	);
	//social icon 8
	$wp_customize->add_setting(
		'lprd_social_icon_8',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text_attr',
		)
	);
	$wp_customize->add_control(
		new Leopard_Customize_Icon_Control(
			$wp_customize,
			'lprd_social_icon_8',
			array(
				'type'      => 'icon',
				'label' => __('Social Icon 8', 'leopard'),
				'section' => 'lprd_header_social_section',
				'priority' => 10,
			))
	);
	//social link 8
	$wp_customize->add_setting(
		'lprd_social_link_8',
		array(
			'default' => '',
			'transport'  => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'lprd_social_link_8',
		array(
			'type'      => 'url',
			'label'     => __('Social Link 8', 'leopard'),
			'section'   => 'lprd_header_social_section',
			'priority'  => 10
		)
	);
	//social icon 9
	$wp_customize->add_setting(
		'lprd_social_icon_9',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text_attr',
		)
	);
	$wp_customize->add_control(
		new Leopard_Customize_Icon_Control(
			$wp_customize,
			'lprd_social_icon_9',
			array(
				'type'      => 'icon',
				'label' => __('Social Icon 9', 'leopard'),
				'section' => 'lprd_header_social_section',
				'priority' => 10,
			))
	);
	//social link 9
	$wp_customize->add_setting(
		'lprd_social_link_9',
		array(
			'default' => '',
			'transport'  => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'lprd_social_link_9',
		array(
			'type'      => 'url',
			'label'     => __('Social Link 9', 'leopard'),
			'section'   => 'lprd_header_social_section',
			'priority'  => 10
		)
	);
	//social icon 10
	$wp_customize->add_setting(
		'lprd_social_icon_10',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text_attr',
		)
	);
	$wp_customize->add_control(
		new Leopard_Customize_Icon_Control(
			$wp_customize,
			'lprd_social_icon_10',
			array(
				'type'      => 'icon',
				'label' => __('Social Icon 10', 'leopard'),
				'section' => 'lprd_header_social_section',
				'priority' => 10,
			))
	);
	//social link 10
	$wp_customize->add_setting(
		'lprd_social_link_10',
		array(
			'default' => '',
			'transport'  => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'lprd_social_link_10',
		array(
			'type'      => 'url',
			'label'     => __('Social Link 10', 'leopard'),
			'section'   => 'lprd_header_social_section',
			'priority'  => 10
		)
	);


} // header panel close
