<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Leopard
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('lprd--post-item'); ?>>
	<div class="lprd--post-thumb-area">
		<a class="lprd--post-thumb" href="<?php the_permalink(); ?>">
			<?php if (has_post_thumbnail()): ?>
				<?php
				the_post_thumbnail('full');
			endif; ?>
		</a>
	</div>

	<div class="lprd--post-content-area">

		<?php
			the_title( '<h2 class="lprd--post-title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>

		<div class="lprd--post-excerpt entry-content">
			<?php
			if (has_excerpt()) {
				the_excerpt();
			} else {
				lprd_excerpt(30, ' ....');
			}

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'leopard' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>

	</div>

	<div class="lprd--post-meta-wrap">
		<ul>
			<li class="lprd--post-author">
				<?php echo lprd_posted_by(); ?>
			</li>
			<li class="lprd--post-date">
				<?php echo lprd_posted_on(); ?>
			</li>
			<li class="lprd--post-comment">
				<?php echo lprd_get_comment_number();?>
			</li>
		</ul>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
