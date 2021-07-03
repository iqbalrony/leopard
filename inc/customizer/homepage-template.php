<?php
/**
 * Homepage Template Settings panel at Theme Customizer
 *
 * @package Leopard
 * @since 1.0.0
 */

add_action('customize_register', 'leopard_hp_tmpl_settings_register');

function leopard_hp_tmpl_settings_register($wp_customize) {


	/**
	 * Add Additional Settings Panel
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_panel(
		'lprd_hp_tmpl_settings_panel',
		array(
			'priority' => 30,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Homepage Template Settings', 'leopard'),
		)
	);

	/**
	 * Hero Banner
	 */
	$wp_customize->add_section(
		'lprd_hp_tmpl_hero_section',
		array(
			'title' => __('Hero Banner', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_hp_tmpl_settings_panel',
		)
	);

	//Hero Banner Small Title
	$wp_customize->add_setting(
		'hero_sml_title',
		array(
			'default' => 'PawShop',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'hero_sml_title',
		array(
			'type' => 'text',
			'label' => esc_html__('Small Title', 'leopard'),
			'description' => esc_html__('Set small title.', 'leopard'),
			'section' => 'lprd_hp_tmpl_hero_section',
			'priority' => 10,
		)
	);

	//Hero Banner Big Bold Title
	$wp_customize->add_setting(
		'hero_big_bold_title',
		array(
			'default' => 'Best Furniture ',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'hero_big_bold_title',
		array(
			'type' => 'text',
			'label' => esc_html__('Big Bold Title', 'leopard'),
			'description' => esc_html__('Set big bold title.', 'leopard'),
			'section' => 'lprd_hp_tmpl_hero_section',
			'priority' => 10,
		)
	);

	//Hero Banner Big Thin Title
	$wp_customize->add_setting(
		'hero_big_thin_title',
		array(
			'default' => '& Decor',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'hero_big_thin_title',
		array(
			'type' => 'text',
			'label' => esc_html__('Big Thin Title', 'leopard'),
			'description' => esc_html__('Set big thin title.', 'leopard'),
			'section' => 'lprd_hp_tmpl_hero_section',
			'priority' => 10,
		)
	);

	//Hero Banner Content
	$wp_customize->add_setting(
		'hero_content',
		array(
			'default' => 'Grab your best product &amp; get disconut upto 50% !',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'hero_content',
		array(
			'type' => 'textarea',
			'label' => esc_html__('Banner Content', 'leopard'),
			'description' => esc_html__('Set banner content.', 'leopard'),
			'section' => 'lprd_hp_tmpl_hero_section',
			'priority' => 10,
		)
	);

	//Hero Banner Button Text
	$wp_customize->add_setting(
		'hero_button_text',
		array(
			'default' => 'BROWSE NOW',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'hero_button_text',
		array(
			'type' => 'text',
			'label' => esc_html__('Button Text', 'leopard'),
			'description' => esc_html__('Set button text.', 'leopard'),
			'section' => 'lprd_hp_tmpl_hero_section',
			'priority' => 10,
		)
	);

	//Hero Banner Button Url
	$wp_customize->add_setting(
		'hero_button_url',
		array(
			'default' => '#',
			'transport' => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'hero_button_url',
		array(
			'type' => 'url',
			'label' => __('Button Link', 'leopard'),
			'description' => esc_html__('Set button link.', 'leopard'),
			'section' => 'lprd_hp_tmpl_hero_section',
			'priority' => 10
		)
	);

	//Hero Banner Image
	$wp_customize->add_setting(
		'hero_banner_img',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'hero_banner_img',
			array(
				'label' => __('Banner Image', 'leopard'),
				'description' => esc_html__('Set banner image.', 'leopard'),
				'section' => 'lprd_hp_tmpl_hero_section',
				'priority' => 10,
			))
	);

	/**
	 * Grid Product
	 */
	if (class_exists('WooCommerce')) {
		$wp_customize->add_section(
			'lprd_hp_tmpl_grid_product_section',
			array(
				'title' => __('Grid Product', 'leopard'),
				'priority' => 5,
				'panel' => 'lprd_hp_tmpl_settings_panel',
			)
		);

		//Grid Product Small Title
		$wp_customize->add_setting(
			'grid_product_sml_title',
			array(
				'default' => 'CATEGOREY',
				'transport' => 'refresh',
				'sanitize_callback' => 'lprd_sanitize_plain_text',
			)
		);
		$wp_customize->add_control(
			'grid_product_sml_title',
			array(
				'type' => 'text',
				'label' => esc_html__('Small Title', 'leopard'),
				'description' => esc_html__('Set small section title.', 'leopard'),
				'section' => 'lprd_hp_tmpl_grid_product_section',
				'priority' => 10,
			)
		);

		//Grid Product Big Bold Title
		$wp_customize->add_setting(
			'grid_product_big_bold_title',
			array(
				'default' => 'Products ',
				'transport' => 'refresh',
				'sanitize_callback' => 'lprd_sanitize_plain_text',
			)
		);
		$wp_customize->add_control(
			'grid_product_big_bold_title',
			array(
				'type' => 'text',
				'label' => esc_html__('Big Bold Title', 'leopard'),
				'description' => esc_html__('Set big bold section title.', 'leopard'),
				'section' => 'lprd_hp_tmpl_grid_product_section',
				'priority' => 10,
			)
		);

		//Grid Product Big Thin Title
		$wp_customize->add_setting(
			'grid_product_big_thin_title',
			array(
				'default' => '& Genre.',
				'transport' => 'refresh',
				'sanitize_callback' => 'lprd_sanitize_plain_text',
			)
		);
		$wp_customize->add_control(
			'grid_product_big_thin_title',
			array(
				'type' => 'text',
				'label' => esc_html__('Big Thin Title', 'leopard'),
				'description' => esc_html__('Set big thin section title.', 'leopard'),
				'section' => 'lprd_hp_tmpl_grid_product_section',
				'priority' => 10,
			)
		);

		//Products Per Page
		$wp_customize->add_setting(
			'grid_product_per_page',
			array(
				'default' => '4',
				'transport' => 'refresh',
				'sanitize_callback' => 'lprd_sanitize_plain_text',
			)
		);
		$wp_customize->add_control(
			'grid_product_per_page',
			array(
				'type' => 'number',
				'label' => esc_html__('Products Per Page', 'leopard'),
				'description' => esc_html__('Set how many product item want to show. To show all item type -1.', 'leopard'),
				'section' => 'lprd_hp_tmpl_grid_product_section',
				'input_attrs' => array('min' => -1, 'max' => 1000, 'step' => 1),
				'priority' => 10,
			)
		);

		//Products Pagination
		$wp_customize->add_setting(
			'grid_product_pagination',
			array(
				'default' => 'hide',
				'transport' => 'refresh',
				'sanitize_callback' => 'lprd_sanitize_switch_option',
			)
		);
		$wp_customize->add_control(new Leopard_Customize_Switch_Control(
				$wp_customize,
				'grid_product_pagination',
				array(
					'type' => 'switch',
					'label' => esc_html__('Pagination', 'leopard'),
					'description' => esc_html__('Show/Hide option for pagination.', 'leopard'),
					'section' => 'lprd_hp_tmpl_grid_product_section',
					'choices' => array(
						'show' => esc_html__('Show', 'leopard'),
						'hide' => esc_html__('Hide', 'leopard')
					),
					'priority' => 10,
				)
			)
		);
	}

	/**
	 * CTA (Call To Action)
	 */
	$wp_customize->add_section(
		'lprd_hp_tmpl_cta_section',
		array(
			'title' => __('CTA Banner', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_hp_tmpl_settings_panel',
		)
	);

	//CTA Banner Big Bold Title
	$wp_customize->add_setting(
		'cta_big_bold_title',
		array(
			'default' => 'Buy Now & ',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'cta_big_bold_title',
		array(
			'type' => 'text',
			'label' => esc_html__('Big Bold Title', 'leopard'),
			'description' => esc_html__('Set big bold title.', 'leopard'),
			'section' => 'lprd_hp_tmpl_cta_section',
			'priority' => 10,
		)
	);

	//CTA Banner Big Thin Title
	$wp_customize->add_setting(
		'cta_big_thin_title',
		array(
			'default' => 'Get Discount.',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'cta_big_thin_title',
		array(
			'type' => 'text',
			'label' => esc_html__('Big Thin Title', 'leopard'),
			'description' => esc_html__('Set big thin title.', 'leopard'),
			'section' => 'lprd_hp_tmpl_cta_section',
			'priority' => 10,
		)
	);

	//CTA Banner Content
	$wp_customize->add_setting(
		'cta_content',
		array(
			'default' => 'Up to 50% discount at any sofa.',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'cta_content',
		array(
			'type' => 'textarea',
			'label' => esc_html__('Banner Content', 'leopard'),
			'description' => esc_html__('Set banner content.', 'leopard'),
			'section' => 'lprd_hp_tmpl_cta_section',
			'priority' => 10,
		)
	);

	//CTA Banner Button Text
	$wp_customize->add_setting(
		'cta_button_text',
		array(
			'default' => 'BROWSE NOW',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'cta_button_text',
		array(
			'type' => 'text',
			'label' => esc_html__('Button Text', 'leopard'),
			'description' => esc_html__('Set button text.', 'leopard'),
			'section' => 'lprd_hp_tmpl_cta_section',
			'priority' => 10,
		)
	);

	//CTA Banner Button Url
	$wp_customize->add_setting(
		'cta_button_url',
		array(
			'default' => '#',
			'transport' => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'cta_button_url',
		array(
			'type' => 'url',
			'label' => __('Button Link', 'leopard'),
			'description' => esc_html__('Set button link.', 'leopard'),
			'section' => 'lprd_hp_tmpl_cta_section',
			'priority' => 10
		)
	);

	//CTA Banner Image
	$wp_customize->add_setting(
		'cta_banner_img',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'cta_banner_img',
			array(
				'label' => __('Banner Image', 'leopard'),
				'description' => esc_html__('Set banner image.', 'leopard'),
				'section' => 'lprd_hp_tmpl_cta_section',
				'priority' => 10,
			))
	);

	/**
	 * Grid Post
	 */
	$wp_customize->add_section(
		'lprd_hp_tmpl_grid_post_section',
		array(
			'title' => __('Grid Post', 'leopard'),
			'priority' => 5,
			'panel' => 'lprd_hp_tmpl_settings_panel',
		)
	);

	//Grid Post Small Title
	$wp_customize->add_setting(
		'grid_post_sml_title',
		array(
			'default' => 'Blog',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'grid_post_sml_title',
		array(
			'type' => 'text',
			'label' => esc_html__('Small Title', 'leopard'),
			'description' => esc_html__('Set small section title.', 'leopard'),
			'section' => 'lprd_hp_tmpl_grid_post_section',
			'priority' => 10,
		)
	);

	//Grid Post Big Bold Title
	$wp_customize->add_setting(
		'grid_post_big_bold_title',
		array(
			'default' => 'Latest Update ',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'grid_post_big_bold_title',
		array(
			'type' => 'text',
			'label' => esc_html__('Big Bold Title', 'leopard'),
			'description' => esc_html__('Set big bold section title.', 'leopard'),
			'section' => 'lprd_hp_tmpl_grid_post_section',
			'priority' => 10,
		)
	);

	//Grid Post Big Thin Title
	$wp_customize->add_setting(
		'grid_post_big_thin_title',
		array(
			'default' => '& News',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'grid_post_big_thin_title',
		array(
			'type' => 'text',
			'label' => esc_html__('Big Thin Title', 'leopard'),
			'description' => esc_html__('Set big thin section title.', 'leopard'),
			'section' => 'lprd_hp_tmpl_grid_post_section',
			'priority' => 10,
		)
	);

	//Posts Per Page
	$wp_customize->add_setting(
		'grid_post_per_page',
		array(
			'default' => '3',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_plain_text',
		)
	);
	$wp_customize->add_control(
		'grid_post_per_page',
		array(
			'type' => 'number',
			'label' => esc_html__('Posts Per Page', 'leopard'),
			'description' => esc_html__('Set how many post item want to show. To show all item type -1.', 'leopard'),
			'section' => 'lprd_hp_tmpl_grid_post_section',
			'input_attrs' => array('min' => -1, 'max' => 1000, 'step' => 1),
			'priority' => 10,
		)
	);

	//Posts Pagination
	$wp_customize->add_setting(
		'grid_post_pagination',
		array(
			'default' => 'hide',
			'transport' => 'refresh',
			'sanitize_callback' => 'lprd_sanitize_switch_option',
		)
	);
	$wp_customize->add_control(new Leopard_Customize_Switch_Control(
			$wp_customize,
			'grid_post_pagination',
			array(
				'type' => 'switch',
				'label' => esc_html__('Pagination', 'leopard'),
				'description' => esc_html__('Show/Hide option for pagination.', 'leopard'),
				'section' => 'lprd_hp_tmpl_grid_post_section',
				'choices' => array(
					'show' => esc_html__('Show', 'leopard'),
					'hide' => esc_html__('Hide', 'leopard')
				),
				'priority' => 10,
			)
		)
	);


} //shop panel close
