<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Leopard
 */

get_header();
?>

<div class="site-main lprd-404-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="lprd-404 error-404 not-found text-center">
					<?php do_action('lprd_404_page_content_markup'); ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- #main -->

<?php
get_footer();
