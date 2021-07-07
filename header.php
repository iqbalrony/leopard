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
			<div class="col-lg-3 col-md-6 col-8">
				<div class="site-branding">
					<?php
					if( get_custom_logo() ):
						the_custom_logo();
					else :
					?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
				</div><!-- .site-branding -->
			</div>
			<div class="col-lg-6 col-md-6 col-4 menu-toggle-area">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="dashicons dashicons-menu"></span></button>
			</div>
			<div class="col-lg-9 col-md-12 col-12">

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
					<button class="screen-reader-text lprd-menu-close"><i class="fas fa-times"></i></button>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</div>
</header><!-- #masthead -->

<?php if( 'show' == get_theme_mod('lprd_breadcrumb_on_off', 'show') ):?>
	<div class="lprd-breadcrumbs-area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php echo lprd_breadcrumb_trail(); ?>
					<?php lprd_breadcrumb(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
