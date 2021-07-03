<?php

/**
 * Enqueue scripts and styles.
 */
class LPRD_Enqueue_Scripts {

	public function __construct() {
		/**
		 * hooking theme's scripts and stylesheet
		 */
		add_action('wp_enqueue_scripts', array($this, 'leopard_scripts'));
	}

	/**
	 * Function for enqueue all scripts
	 */
	public function leopard_scripts() {
		/**
		 * Load All Stylesheet
		 */

		// // bootstrap stylesheet.
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null);

		// // Fontawesome V4 stylesheet.
		wp_enqueue_style('fontawesome-5', get_template_directory_uri() . '/assets/css/all.min.css', array(), null);

		// // material-design-icons stylesheet.
		// wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/assets/css/materialdesignicons.min.css', array(), null);

		// // slicknav stylesheet.
		// wp_enqueue_style('slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), null);

		// // nice-select stylesheet.
		// wp_enqueue_style('nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), null);

		// // mCustomScrollbar stylesheet.
		// wp_enqueue_style('mCustomScrollbar', get_template_directory_uri() . '/assets/css/jquery.mCustomScrollbar.min.css', array(), null);

		// Add custom fonts, used in the main stylesheet.
		// wp_enqueue_style('leopard-fonts', lprd_fonts_url(), array(), null);


		// Theme stylesheet.
		wp_enqueue_style( 'leopard-style', get_stylesheet_uri(), array(), _S_VERSION );
		// Add main stylesheet
		wp_enqueue_style( 'leopard-main-style', get_template_directory_uri() . '/assets/css/leopard-style.css', array(), _S_VERSION );
		// wp_style_add_data( 'leopard-style', 'rtl', 'replace' );

		// Add responsive stylesheet
		wp_enqueue_style('leopard-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), null);




		/**
		 * Load All jQuery Library
		 */
		wp_enqueue_script( 'leopard-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );


		// Add leopard-main js library
		wp_enqueue_script('leopard-main-js', get_template_directory_uri() . '/assets/js/leopard-main.js', array('jquery'), '', true);

		//localize scripts
		wp_localize_script('leopard-main-js', 'leopard_localize', array(
			'theme_url' => apply_filters('leopard-home-url', home_url()),
			'theme_directory' => get_template_directory_uri(),
			'ajax_url' => admin_url('admin-ajax.php'),
			// 'nonce' => wp_create_nonce("validation_nonce")
		));


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

}

new LPRD_Enqueue_Scripts();
