<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Leopard
 */

get_header();
$layout = '';
// $layout = 'left';
// $layout = 'without';
if ( 'left' == $layout ) {
	$content_cls = 'col-lg-8 offset-lg-0 order-lg-2 col-md-10 offset-md-1 col-sm-12 offset-sm-0';
} elseif ( 'without' == $layout ) {
	$content_cls = 'col-md-12 col-sm-12 col-lg-12 col-xl-12';
} else {
	$content_cls = 'col-lg-8 offset-lg-0 col-md-10 offset-md-1 col-sm-12 offset-sm-0';
}
?>
<div id="primary" class="lprd-index-page lprd-blog-page site-main">
	<div class="container">
		<div class="row">
			<div class="<?php esc_attr_e($content_cls)?>">
				<div class="lprd-default-page-container">
					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
			</div>
				<?php
					if( $layout != 'without' ){
						get_sidebar();
					}
				?>
		</div>
	</div>
</div><!-- #main -->

<?php
get_footer();
