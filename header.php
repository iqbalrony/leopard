<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leopard
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'leopard' ); ?></a>

<header id="masthead" class="lprd-header-area site-header">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-4 col-md-6 col-8">
				<div class="site-branding">
					<?php
					if( get_custom_logo() ):
						the_custom_logo();
					else :
						$leopard_description = get_bloginfo( 'description', 'display' );
					?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<p class="site-description"><?php echo $leopard_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
			</div>
			<div class="col-lg-6 col-md-6 col-4 menu-toggle-area">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="dashicons dashicons-menu-alt2"></span></button>
			</div>
			<div class="col-lg-8 col-md-6 col-12">

				<nav id="site-navigation" class="main-navigation hidden-mobile">

					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'menu_class' => 'lprd-menu menu nav-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</div>
</header><!-- #masthead -->
