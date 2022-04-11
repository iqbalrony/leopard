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
						<?php
						$copyright_txt = get_theme_mod('lprd_copyright_txt');
						if($copyright_txt):
							echo wpautop(lprd_allowed_html($copyright_txt));
						?>
						<?php
						else:
							print( esc_html__( 'Leopard', 'leopard' ) );
						?>
						<?php endif; ?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</div> <!--	lprd_footer_copyright_area END-->
</footer>

<?php wp_footer(); ?>

</body>
</html>
