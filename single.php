<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Leopard
 */

get_header();
$content_cls = lprd_page_layout_cls();
?>

<div id="primary" class="lprd-single-post lprd-blog-page site-main">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($content_cls)?>">
				<div class="lprd-default-page-container">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content','single');

						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'leopard' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'leopard' ) . '</span> <span class="nav-title">%title</span>',
							)
						);

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
