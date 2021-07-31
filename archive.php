<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Leopard
 */

get_header();
$content_cls = lprd_page_layout_cls();
?>

<div id="primary" class="lprd-archive-page lprd-blog-page site-main">
	<div class="container">
		<div class="row">
			<div class="<?php esc_attr_e($content_cls)?>">
				<div class="lprd-default-page-container">

					<?php if ( have_posts() ) : ?>

						<?php if( lprd_breadcrumb_show() ):?>
							<header class="page-header">
								<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
								?>
							</header><!-- .page-header -->
						<?php endif;?>

						<?php
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

				<?php if( 'without' != lprd_page_layout() ){ get_sidebar(); } ?>

		</div>
	</div>
</div><!-- #main -->

<?php
get_footer();
