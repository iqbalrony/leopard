<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leopard
 */

?>

<footer id="lprd-footer" class="site-footer lprd-footer-section">
	<?php if (is_active_sidebar('leopard-footer-widget')): ?>
		<div class="lprd-footer-widget-area">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('leopard-footer-widget'); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="lprd-footer-copyright-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="site-info text-center">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'leopard' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'leopard' ), 'WordPress' );
							?>
						</a>
						<span class="sep"> | </span>
							<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Theme: %1$s by %2$s', 'leopard' ), 'leopard', '<a href="http://www.iqbalrony.com/">iqbalrony</a>' );
							?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</div> <!--	lprd_footer_copyright_area END-->
</footer>

<?php wp_footer(); ?>

</body>
</html>
