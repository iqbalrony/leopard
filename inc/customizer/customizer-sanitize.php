<?php
/**
 * File to sanitize customizer field
 *
 * @package Leopard
 * @since 1.0.0
 */


/**
 * Render the site title for the selective refresh partial.
 *
 * @since leopard 1.0.0
 * @see leopard_customize_register()
 *
 * @return void
 */
function lprd_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since leopard 1.0.0
 * @see leopard_customize_register()
 *
 * @return void
 */
function lprd_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * switch option (show/hide)
 *
 * @since 1.0.0
 */
function lprd_sanitize_switch_option( $input ) {
	$valid_keys = array(
		'show'  => __( 'Show', 'leopard' ),
		'hide'  => __( 'Hide', 'leopard' )
	);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * check if header sing in button options enable
 *
 * @since 1.0.0
 */
function lprd_is_shop_show( $control ) {
	if ( function_exists('woocommerce') || class_exists( 'WooCommerce' ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * check if breadcrumb options enable
 *
 * @since 1.0.0
 */
function lprd_is_breadcrumb_show( $control ) {
	if ( $control->manager->get_setting('lprd_breadcrumb_on_off')->value() == 'show' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * check copyright html tag check
 *
 * @since 1.0.0
 */
function lprd_copyright_html($input) {
	$allowed_html = array(
		'img' => array(
			'src' => array(),
			'atl' => array(),
			'class' => array()
		),
		'a' => array(
			'href' => array(),
			'title' => array(),
			'class' => array()
		),
		'i' => array(
			'class' => array()
		),
		'span' => array(
			'class' => array()
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
	);
	return wp_kses($input, $allowed_html);
}


/**
 * Sanitize select and radio fields
 *
 * @since 1.0.0
 */
function lprd_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize plain text
 *
 * @since 1.0.0
 */
function lprd_sanitize_plain_text( $input ) {
	$input = esc_html( $input );
	return $input;
}

/**
 * Sanitize attr
 *
 * @since 1.0.0
 */
function lprd_sanitize_plain_text_attr( $input ) {
	$input = esc_attr( $input );
	return $input;
}










/**
 * Sanitize checkbox value
 *
 * @since 1.0.1
 */
function lprd_sanitize_checkbox( $input ) {
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}


/**
 * Sanitize site layout
 *
 * @since 1.0.0
 */
function lprd_sanitize_site_layout( $input ) {
    $valid_keys = array(
        'fullwidth_layout' => __( 'Fullwidth Layout', 'leopard' ),
        'boxed_layout'     => __( 'Boxed Layout', 'leopard' )
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since leopard 1.0.0
 * @see leopard_footer_settings_register()
 *
 * @return void
 */
function lprd_customize_partial_copyright() {
    return get_theme_mod( 'lprd_copyright_text' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since leopard 1.0.0
 * @see leopard_design_settings_register()
 *
 * @return void
 */
function lprd_customize_partial_related_title() {
    return get_theme_mod( 'lprd_related_posts_title' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since leopard 1.0.0
 * @see leopard_design_settings_register()
 *
 * @return void
 */
function lprd_customize_partial_archive_more() {
    return get_theme_mod( 'lprd_archive_read_more_text' );
}

/**
 * Active callback function for featured post section at top header
 *
 * @since 1.0.0
 */
function lprd_featured_posts_active_callback( $control ) {
    if ( $control->manager->get_setting( 'lprd_top_featured_option' )->value() == 'show' ) {
        return true;
    } else {
        return false;
    }
}




/**
 * check if related post options enable
 *
 * @since 1.0.0
 */
function lprd_is_related_showen( $control ) {
    if ( $control->manager->get_setting('lprd_related_posts_option')->value() == 'show' ) {
       return true;
    } else {
       return false;
    }
}

/**
 * check if footer widget area options enable
 *
 * @since 1.0.0
 */
function lprd_is_footer_showen( $control ) {
    if ( $control->manager->get_setting('lprd_footer_widget_option')->value() == 'show' ) {
       return true;
    } else {
       return false;
    }
}
