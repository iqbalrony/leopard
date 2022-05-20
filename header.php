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
					if( get_theme_mod( 'custom_logo' ) ):
						the_custom_logo();
					else :
					?>
						<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h2>
						<?php
						$description = get_bloginfo( 'description' );
						if ( $description ) {
							echo sprintf( '<div class="site-description">%s</div>', esc_html( $description ) );
						}
						?>
					<?php endif; ?>
				</div><!-- .site-branding -->
			</div>
			<div class="col-lg-6 col-md-6 col-4 menu-toggle-area">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
			</div>
			<div class="col-lg-9 col-md-12 col-12 lprd-menu-area">

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

<?php if( lprd_breadcrumb_show() && ! is_404() ):?>
	<div class="lprd-breadcrumbs-area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="lprd-breadcrumbs">
						<?php if (is_singular('post')): ?>
							<h1 class="lprd-breadcrumbs-title"><?php echo lprd_breadcrumb_title(); ?></h1>
							<div class="lprd-breadcrumbs-meta">
								<?php
									if (!(is_home() && is_front_page())) {
										printf('<a class="active" href="%s"><i class="fas fa-home"></i>' . esc_html__('Home', 'leopard') . '</a>', esc_url(home_url()));
									}
									echo lprd_posted_by();
									echo lprd_posted_on();
								?>
							</div>
						<?php else: ?>
							<h2 class="lprd-breadcrumbs-title"><?php echo lprd_breadcrumb_title(); ?></h2>
							<?php lprd_breadcrumb(); ?>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
