<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Leopard
 */

get_header();
$content_cls = lprd_page_layout_cls();
?>

<div id="primary" class="lprd-page site-main">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($content_cls)?>">
				<div class="lprd-default-page-container">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
			</div>

				<?php if( 'without' != lprd_page_layout() ){ get_sidebar(); } ?>

		</div>
	</div>
</div><!-- #main -->

<?php
get_footer();
