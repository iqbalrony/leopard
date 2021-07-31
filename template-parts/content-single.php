<?php
/**
 * Template part for displaying single post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Leopard
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('lprd-single-post-item'); ?>>


	<?php if(  lprd_breadcrumb_show() ):?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<div class="entry-meta">
				<?php
					echo lprd_posted_on();
					echo lprd_posted_by();
				?>
			</div>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php if( has_post_thumbnail() ):?>
		<div class="lprd-single-post-thumb-area">
			<?php lprd_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
			the_content(sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'leopard'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			));

			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'leopard'),
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>',
			));
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			lprd_cat_list( 'style-1', ',  ' );
			lprd_tags_list('style-1');
		?>
		<?php
			if ( get_edit_post_link() ) :
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'leopard' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					),
					'<span class="edit-link">',
					'</span>'
				);
			endif;
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
