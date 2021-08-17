<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Leopard
 */

get_header();
$content_cls = lprd_page_layout_cls();
?>

<div id="primary" class="lprd-search-page lprd-blog-page site-main">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($content_cls)?>">
				<div class="lprd-default-page-container">
					<?php if ( have_posts() ) : ?>
						<?php if( lprd_breadcrumb_show() ):?>
							<header class="page-header">
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'leopard' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header><!-- .page-header -->
						<?php endif;?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content' );

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
