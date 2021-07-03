<?php
/**
 * Leopard Shop Settings panel at Theme Customizer
 *
 * @package Leopard
 * @since 1.0.0
 */

add_action('customize_register', 'leopard_shop_settings_register');

function leopard_shop_settings_register($wp_customize) {


	/**
	 * Add Additional Settings Panel
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_panel(
		'lprd_shop_settings_panel',
		array(
			'priority' => 30,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Shop Settings', 'leopard'),
		)
	);

	/**
	 * Product item per page
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_shop_section',
		array(
			'title' => __('Shop Item Per Page', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_shop_settings_panel',
		)
	);

	$wp_customize->add_setting(
		'product_per_page',
		array(
			'default' => '10',
			'transport'  => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'product_per_page',
		array(
			'type'     => 'text',
			'label'     => esc_html__( 'Shop Item Per Page', 'leopard' ),
			'description'   => esc_html__( 'Set how many shop post item want to show. To show all item type -1.', 'leopard' ),
			'section'   => 'lprd_shop_section',
			'priority'  => 10,
		)
	);

	/**
	 * Product page layout
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_shop_layout_section',
		array(
			'title' => __('Shop Page Layout', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_shop_settings_panel',
		)
	);
	$wp_customize->add_setting(
		'lprd_shop_layout',
		array(
			'default'           => 'without',
			'sanitize_callback' => 'lprd_sanitize_select',
		)
	);
	$wp_customize->add_control( new Leopard_Customize_Control_Radio_Image(
			$wp_customize,
			'lprd_shop_layout',
			array(
				'label'    => esc_html__( 'Sidebars', 'leopard' ),
				'description' => esc_html__( 'Choose sidebar from available layouts', 'leopard' ),
				'section'  => 'lprd_shop_layout_section',
				'choices'  => array(
					'left' => array(
						'label' => esc_html__( 'Left Sidebar', 'leopard' ),
						'url'   => '%s/assets/images/left-sidebar.png'
					),
					'right' => array(
						'label' => esc_html__( 'Right Sidebar', 'leopard' ),
						'url'   => '%s/assets/images/right-sidebar.png'
					),
					'without' => array(
						'label' => esc_html__( 'Without Sidebar', 'leopard' ),
						'url'   => '%s/assets/images/no-sidebar.png'
					)
				),
				'priority' => 5
			)
		)
	);

	/**
	 * Shop page columns per row
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'lprd_shop_page_columns_per_row',
		array(
			'title' => __('Shop Page Columns', 'leopard'),
			'description' => __('Shop page product columns per row.', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_shop_settings_panel',
		)
	);

	$wp_customize->add_setting(
		'lprd_shop_columns',
		array(
			'default' => '4',
			'transport'  => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'lprd_shop_columns',
		array(
			'type'      => 'number',
			'label'     => esc_html__( 'Column per row', 'leopard' ),
			'description' => __('Minimum value 1 and maximum value 4.', 'leopard'),
			'input_attrs' => array( 'min' => 1, 'max' => 4, 'step'  => 1 ),
			'section'   => 'lprd_shop_page_columns_per_row',
			'priority'  => 10
		)
	);



} //shop panel close
