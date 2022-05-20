<?php

/**
 * Enqueue scripts and styles.
 */
class LPRD_Enqueue_Scripts {

	/**
	 * hooking theme's scripts and stylesheet
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [$this, 'leopard_scripts'] );
	}

	/**
	 * Function for enqueue all scripts
	 */
	public function leopard_scripts() {

		// // bootstrap stylesheet.
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], null );

		// // Fontawesome V4 stylesheet.
		wp_enqueue_style( 'fontawesome-5', get_template_directory_uri() . '/assets/css/all.min.css', [], null );

		// Add custom fonts, used in the main stylesheet.
		wp_enqueue_style( 'leopard-fonts', lprd_fonts_url(), [], null );

		// Theme stylesheet.
		wp_enqueue_style( 'leopard-style', get_stylesheet_uri(), [], LPRD_VERSION );
		// Add main stylesheet
		wp_enqueue_style( 'leopard-main-style', get_template_directory_uri() . '/assets/css/leopard-style.css', [], LPRD_VERSION );

		// Add responsive stylesheet
		wp_enqueue_style( 'leopard-responsive', get_template_directory_uri() . '/assets/css/responsive.css', [], null );

		/**
		 * Load All jQuery Library
		 */
		wp_enqueue_script( 'leopard-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], LPRD_VERSION, true );

		// Add leopard-main js library
		wp_enqueue_script( 'leopard-main-js', get_template_directory_uri() . '/assets/js/leopard-main.js', ['jquery'], '', true );

		//localize scripts
		wp_localize_script( 'leopard-main-js', 'leopard_localize', [
			'theme_url'       => apply_filters( 'leopard-home-url', home_url() ),
			'theme_directory' => get_template_directory_uri(),
			'ajax_url'        => admin_url( 'admin-ajax.php' ),
			// 'nonce' => wp_create_nonce("validation_nonce")
		] );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/**
		 * Customizer inline style
		 */
		$custom_css = '';

		//Theme's Color Scheme
		$color_white = get_theme_mod( 'lprd_color_white' );
		$color_white_lilac = get_theme_mod( 'lprd_color_white_lilac' );
		$color_porcelain = get_theme_mod( 'lprd_color_porcelain' );
		$color_french_gray = get_theme_mod( 'lprd_color_french_gray' );
		$color_trout = get_theme_mod( 'lprd_color_trout' );
		$color_firefly = get_theme_mod( 'lprd_color_firefly' );
		$color_manatee = get_theme_mod( 'lprd_color_manatee' );
		$color_malibu = get_theme_mod( 'lprd_color_malibu' );
		$color_outrageous_orange = get_theme_mod( 'lprd_color_outrageous_orange' );
		if ( ! empty( $color_white ) || ! empty( $color_white_lilac ) || ! empty( $color_porcelain ) || ! empty( $color_french_gray ) || ! empty( $color_trout ) || ! empty( $color_firefly ) || ! empty( $color_manatee ) || ! empty( $color_malibu ) || ! empty( $color_outrageous_orange ) ) {
			$custom_css .= ':root {';
			if ( ! empty( $color_white ) ) {
				$custom_css .= '--color-white: ' . esc_attr( $color_white ) . ';';
			}
			if ( ! empty( $color_white_lilac ) ) {
				$custom_css .= '--color-white-lilac: ' . esc_attr( $color_white_lilac ) . ';';
			}
			if ( ! empty( $color_porcelain ) ) {
				$custom_css .= '--color-porcelain: ' . esc_attr( $color_porcelain ) . ';';
			}
			if ( ! empty( $color_french_gray ) ) {
				$custom_css .= '--color-french-gray: ' . esc_attr( $color_french_gray ) . ';';
			}
			if ( ! empty( $color_trout ) ) {
				$custom_css .= '--color-trout: ' . esc_attr( $color_trout ) . ';';
			}
			if ( ! empty( $color_firefly ) ) {
				$custom_css .= '--color-firefly: ' . esc_attr( $color_firefly ) . ';';
			}
			if ( ! empty( $color_manatee ) ) {
				$custom_css .= '--color-manatee: ' . esc_attr( $color_manatee ) . ';';
			}
			if ( ! empty( $color_malibu ) ) {
				$custom_css .= '--color-malibu: ' . esc_attr( $color_malibu ) . ';';
			}
			if ( ! empty( $color_outrageous_orange ) ) {
				$custom_css .= '--color-outrageous-orange: ' . esc_attr( $color_outrageous_orange ) . ';';
			}
			$custom_css .= '}';
		}

		//Header With BG style
		$header_image = get_theme_mod( 'header_image' );
		$header_bg_clr = get_theme_mod( 'lprd_header_bg_clr' );
		$header_border_clr = get_theme_mod( 'lprd_header_border_clr' );
		if ( ! empty( $header_image ) ) {
			$custom_css .= '
					.lprd-header-area {
						background-image: url(' . esc_url( $header_image ) . ');
						background-repeat: no-repeat; background-size:cover;
					}
				';
		}
		if ( ! empty( $header_bg_clr ) ) {
			$custom_css .= '
					.lprd-header-area {background-color: ' . esc_attr( $header_bg_clr ) . '; }
				';
		}
		if ( ! empty( $header_border_clr ) ) {
			$custom_css .= '
					.lprd-header-area {border-bottom-color: ' . esc_attr( $header_border_clr ) . '; }
				';
		}

		//Breadcrumb style
		$breadcrumb_bg_img = get_theme_mod( 'lprd_breadcrumb_bg_img' );
		$breadcrumb_bg_clr = get_theme_mod( 'lprd_breadcrumb_bg_clr' );
		$breadcrumb_txt_clr = get_theme_mod( 'lprd_breadcrumb_txt_clr' );
		$breadcrumb_txt_hvr_clr = get_theme_mod( 'lprd_breadcrumb_txt_hvr_clr' );
		if ( ! empty( $breadcrumb_bg_img ) ) {
			$custom_css .= '
						.lprd-breadcrumbs-area {background-image: url(' . esc_url( $breadcrumb_bg_img ) . '); }
					';
		}
		if ( ! empty( $breadcrumb_bg_clr ) ) {
			$custom_css .= '
					.lprd-breadcrumbs-area {background-color: ' . esc_attr( $breadcrumb_bg_clr ) . '; }
				';
		}
		if ( ! empty( $breadcrumb_txt_clr ) ) {
			$custom_css .= '
					.lprd-breadcrumbs .lprd-breadcrumbs-title,
					.lprd-breadcrumbs li,
					.lprd-breadcrumbs a {color: ' . esc_attr( $breadcrumb_txt_clr ) . '; }
				';
		}
		if ( ! empty( $breadcrumb_txt_hvr_clr ) ) {
			$custom_css .= '
					.lprd-breadcrumbs a:hover{color: ' . esc_attr( $breadcrumb_txt_hvr_clr ) . '; }
				';
		}

		//Footer style
		$footer_bg_img = get_theme_mod( 'lprd_footer_bg_img' );
		$footer_bg_clr = get_theme_mod( 'lprd_footer_bg_clr' );
		if ( ! empty( $footer_bg_img ) ) {
			$custom_css .= '
					footer.lprd-footer-section {background-image: url(' . esc_url( $footer_bg_img ) . '); }
				';
		}
		if ( ! empty( $footer_bg_clr ) ) {
			$custom_css .= '
					footer.lprd-footer-section {background-color: ' . esc_attr( $footer_bg_clr ) . '; }
				';
		}

		if ( ! empty( $custom_css ) ) {
			wp_add_inline_style( 'leopard-responsive', $custom_css );
		}

	}

}

new LPRD_Enqueue_Scripts();
