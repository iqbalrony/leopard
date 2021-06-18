<?php

if ( ! function_exists( 'leopard_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function leopard_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Leopard, use a find and replace
		 * to change 'leopard' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'leopard', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'leopard' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'leopard_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
	add_action( 'after_setup_theme', 'leopard_setup' );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function leopard_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'leopard_content_width', 640 );
}
add_action( 'after_setup_theme', 'leopard_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function leopard_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__('Sidebar', 'leopard'),
		'id' => 'sidebar-1',
		'description' => esc_html__('Add widgets here.', 'leopard'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<div class="lprd-widget-title"><h2 class="widget-title">',
		'after_title' => '</h2></div>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'leopard'),
		'id' => 'leopard-footer-widget',
		'description' => esc_html__('Add widgets here.', 'leopard'),
		'before_widget' => '<div class="col-lg-3 col-md-6 col-sm-6"><section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section></div>',
		'before_title' => '<div class="lprd-widget-title"><h2 class="widget-title">',
		'after_title' => '</h2></div>',
	));
}
add_action( 'widgets_init', 'leopard_widgets_init' );


// add_action( 'after_switch_theme',  'ajx_theme_locations_rescue' );
function ajx_theme_locations_rescue() {
   // bug report / support: http://www.unsalkorkmaz.com/
   // We got old theme's slug name
   $old_theme = get_option( 'theme_switched' );
   // Getting old theme's settings
   $old_theme_mods = get_option("theme_mods_{$old_theme}");
   // Getting old theme's theme location settings
   $old_theme_navs = $old_theme_mods['nav_menu_locations'];
   // Getting new theme's theme location settings
   $new_theme_navs = get_theme_mod( 'nav_menu_locations' );

   // If new theme's theme location is empty (its not empty if theme was activated and set some theme locations before)
   if (!$new_theme_navs) {
	   // Getting registered theme locations on new theme
	   $new_theme_locations = get_registered_nav_menus();

	   foreach ($new_theme_locations as $location => $description ) {
		   // We setting same nav menus for each theme location
		   $new_theme_navs[$location] = $old_theme_navs[$location];
	   }

	   set_theme_mod( 'nav_menu_locations', $new_theme_navs );

   }
}
