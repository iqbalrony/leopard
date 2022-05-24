<?php




/**
 * Body Custom Class
 */
if (!function_exists('lprd_add_body_class')) {
	add_filter('body_class', 'lprd_add_body_class');
	function lprd_add_body_class( $classes ) {
		$layout = lprd_page_layout();

		if ( is_active_sidebar('sidebar-1') ) {
			$classes[] = 'lprd-sidebar-enable';
		}

		if ( 'left' == $layout ) {
			$classes[] = 'lprd-left-sidebar';
		} elseif ( 'right' == $layout ) {
			$classes[] = 'lprd-right-sidebar';
		} else {
			$classes[] = 'lprd-without-sidebar';
		}

		return $classes;
	}
}

/**
 * Add content to the 404 page
 *
 */
add_action('lprd_404_page_content_markup', 'lprd_404_page_content');
function lprd_404_page_content() {
	$text_1 = esc_html__('404', 'leopard');
	$text_2 = esc_html__('Oops! page not found.', 'leopard');
	$text_3 = esc_html__('Sorry, but the page you are looking for is not found. Please, make sure you have typed the current URL.', 'leopard');
	$text_4 = esc_url(home_url('/'));
	$text_5 = esc_html__('Back to Home', 'leopard');
	echo sprintf('<div class="lprd-404-content"><h1>%1$s</h1><h2>%2$s</h2><p>%3$s</p><a class="lprd-default-btn lprd-404-btn" href="%4$s">%5$s<i class="fas fa-arrow-right"></i></a></div>', $text_1, $text_2, $text_3, $text_4, $text_5);

}

/**
 * Escaped title html tags
 *
 * @param string $tag input string of title tag
 * @return string $default default tag will be return during no matches
 */
if ( ! function_exists( 'lprd_escape_tags' ) ) {
	function lprd_escape_tags( $tag, $default = 'span', $extra = [] ) {

		$supports = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];

		$supports = array_merge( $supports, $extra );

		if ( ! in_array( $tag, $supports, true ) ) {
			return $default;
		}

		return $tag;
	}
}

/**
 * Function for custom excerpt
 */
if (!function_exists('lprd_excerpt')) {
	function lprd_excerpt($sl_length = '', $sl_sign = '') {

		if (empty($sl_length)) {
			$length = apply_filters('lprd_excerpt_length', 23);
		} else {
			$length = $sl_length;
		}

		if (empty($sl_sign)) {
			$more = apply_filters('lprd_excerpt_more', '');
		} else {
			$more = $sl_sign;
		}

		printf('<p>%1$s</p>',
			wp_trim_words(get_the_content(), $length, $more)
		);
	}
}

/**
 * Function for Page Layout Option
 */
if (!function_exists('lprd_page_layout')) {
	function lprd_page_layout() {
		$layout = get_theme_mod('lprd_page_layout', 'right');
		if (!is_active_sidebar('sidebar-1')) {
			$layout = 'without';
		}
		return $layout;
	}
}


/**
 * Function for Page Layout Option
 */
if (!function_exists('lprd_page_layout_cls')) {
	function lprd_page_layout_cls() {
		$layout = lprd_page_layout();
		if ( 'left' == $layout ) {
			$content_cls = 'col-lg-8 offset-lg-0 order-lg-2 col-md-10 offset-md-1 col-sm-12 offset-sm-0';
		} elseif ( 'without' == $layout ) {
			$content_cls = 'col-md-12 col-sm-12 col-lg-12 col-xl-12';
		} else {
			$content_cls = 'col-lg-8 offset-lg-0 col-md-10 offset-md-1 col-sm-12 offset-sm-0';
		}
		return $content_cls;
	}
}


if ( ! function_exists( 'lprd_posted_on' ) ){
	/**
	 * return HTML with meta information for the current post-date/time.
	 */
	function lprd_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$icon = '<i class="fas fa-clock"></i>';

		$posted_on = sprintf(
			'<a class="lprd--post-date-text" href="%s" rel="bookmark">%s%s</a>',
			esc_url( get_permalink() ),
			$icon,
			$time_string
		);

		return $posted_on;

	}
}


if ( ! function_exists( 'lprd_posted_by' ) ) {
	/**
	 * return HTML with meta information for the current author.
	 */
	function lprd_posted_by() {

		$icon = '<i class="fas fa-user-alt"></i>';
		$author_id = get_post_field('post_author', get_the_ID());
		$author_name = get_the_author_meta('display_name', $author_id);
		$url = get_author_posts_url($author_id);
		$byline = sprintf(
			'<a class="lprd--post-author-text author vcard" href="%s">%s%s</a>',
			esc_url( $url ),
			$icon,
			esc_html( $author_name )
		);

		return $byline;

	}
}

/**
 * Function for get comment number
 */
if (!function_exists('lprd_get_comment_number')) {

	function lprd_get_comment_number($style = '', $link = true) {
		$number = get_comments_number(get_the_ID());

		if( 0 == $number ){
			$comment_number = sprintf('<span class="lprd--post-comment-text comments-number"><i class="fas fa-comment"></i>%1$s</span>', esc_html__('No Comments', 'leopard') );
		}elseif( 1 == $number ){

			$comment_number = sprintf('<a class="lprd--post-comment-text comments-number" href="%1$s"><i class="fas fa-comment"></i>%2$s</a>', get_comments_link(), esc_html__('1 Comment', 'leopard'));
		}else{
			$comment_number = sprintf('<a class="lprd--post-comment-text comments-number" href="%1$s"><i class="fas fa-comment"></i>%2$s</a>', get_comments_link(), esc_html($number) );
		}

		return $comment_number;
	}
}


/**
 * Function for post's single category
 */
if (!function_exists('lprd_single_cat')) {
	function lprd_single_cat() {
		$cats = get_the_category(get_the_ID());
		if (!empty($cats) && isset($cats[0]->name)) {
			$single_cat = sprintf('<div class="lprd--post-cat"><a href="%1$s" class="lprd--post-cat-text cat-links">%2$s</a></div>', get_category_link($cats[0]->term_id), esc_html($cats[0]->name));
			return $single_cat;
		}
	}
}


/**
 * Function for post categories list
 */
if (!function_exists('lprd_cat_list')) {

	function lprd_cat_list($style = '', $space = ', ') {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list($space);
		$span_tag = '';
		if ('style-1' == $style) {
			$span_tag = '<span>' . esc_html__('Categories: ', 'leopard') . '</span>';
		}
		if ($categories_list) {
			/* translators: 1: list of categories. */
			printf('<div class="cat-links">%1$s %2$s</div>', $span_tag, $categories_list);
		}
	}
}

/**
 * Function for post tags list
 */
if (!function_exists('lprd_tags_list')) {

	function lprd_tags_list($style = '') {
		if ('style-1' == $style) {
			$span_tag = '<span>' . esc_html__('Tags: ', 'leopard') . '</span>';
		} else {
			$span_tag = '';
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list('', ' ');
		if ($tags_list) {
			/* translators: 1: list of tags. */
			printf('<div class="tags-links">%1$s %2$s</div>', $span_tag, $tags_list); // WPCS: XSS OK.
		}
	}
}

/**
 * Function for get thumbnail image
 */
if ( ! function_exists( 'lprd_post_thumbnail' ) ){
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function lprd_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
}

/**
 * Function for Allow HTML Tag
 */
if (!function_exists('lprd_allowed_html')) {
	function lprd_allowed_html($string) {
		$allowed_html = array(
			'div' => array(
				'id' => array(),
				'class' => array()
			),
			'p' => array(
				'id' => array(),
				'class' => array()
			),
			'img' => array(
				'src' => array(),
				'alt' => array(),
				'class' => array()
			),
			'a' => array(
				'href' => array(),
				'title' => array(),
				'class' => array()
			),
			'i' => array(
				'class' => array()
			),
			'span' => array(
				'class' => array()
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
		);
		return wp_kses($string, $allowed_html);
	}
}


/**
 * Register Google fonts.
 */
if (!function_exists('lprd_fonts_url')) {
	function lprd_fonts_url() {
		$fonts_url = '';
		$fonts = array();
		$subsets = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== _x('on', 'Poppins: on or off', 'leopard')) {
			$fonts[] = 'Poppins:200,300,400,500,600';
		}
		if ('off' !== _x('on', 'Montserrat: on or off', 'leopard')) {
			$fonts[] = 'Montserrat:400,500,600,700,800,900';
		}

		if ($fonts) {
			$fonts_url = add_query_arg(array(
				'family' => urlencode(implode('|', $fonts)),
				'display' => urlencode('swap'),
				'subset' => urlencode($subsets),
			), 'https://fonts.googleapis.com/css');
		}

		return $fonts_url;
	}
}

/**
 * get_wysiwyg_output
 */
if (!function_exists('lprd_get_wysiwyg_output')) {
	function lprd_get_wysiwyg_output($meta_key) {
		global $wp_embed;

		$content = $wp_embed->autoembed($meta_key);
		$content = $wp_embed->run_shortcode($content);
		$content = do_shortcode($content);
		$content = wpautop($content);

		return $content;
	}
}

/**
 * Custom Archive Title modifier
 */
if (!function_exists('lprd_get_the_archive_title')) {
	function lprd_get_the_archive_title() {

		if (is_category()) {
			/* translators: Category archive title. 1: Category name */
			$title = single_cat_title('', false);
		} elseif (is_tag()) {
			/* translators: Tag archive title. 1: Tag name */
			$title = single_tag_title('', false);
		} elseif (is_author()) {
			/* translators: Author archive title. 1: Author name */
			$title = get_the_author();
		} elseif (is_year()) {
			/* translators: Yearly archive title. 1: Year */
			$title = get_the_date(_x('Y', 'yearly archives date format', 'leopard'));
		} elseif (is_month()) {
			/* translators: Monthly archive title. 1: Month name and year */
			$title = get_the_date(_x('F Y', 'monthly archives date format', 'leopard'));
		} elseif (is_day()) {
			/* translators: Daily archive title. 1: Date */
			$title = get_the_date(_x('F j, Y', 'daily archives date format', 'leopard'));
		} elseif (is_post_type_archive()) {
			/* translators: Post type archive title. 1: Post type name */
			$title = post_type_archive_title('', false);
			if (is_shop()) {
				$title = woocommerce_page_title();
			}
		} elseif (is_tax()) {
			$tax = get_taxonomy(get_queried_object()->taxonomy);
			/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf(__('%1$s: %2$s', 'leopard'), $tax->labels->singular_name, single_term_title('', false));
		} else {
			$title = esc_html__('Archives', 'leopard');
		}

		/**
		 * Filters the archive title.
		 *
		 * @param string $title Archive title to be displayed.
		 */
		return apply_filters('lprd_get_the_archive_title', $title);
	}
}

/**
 * Function for breadcrumb title
 */
if (!function_exists('lprd_breadcrumb_title')) {
	function lprd_breadcrumb_title() {

		if (is_home() && is_front_page()) {
			$breadcrumb_title = esc_html(get_bloginfo('title'));
		} elseif (is_home() && !is_front_page()) {
			$breadcrumb_title = get_the_title(get_option('page_for_posts'));
		} elseif (is_archive()) {
			$breadcrumb_title = lprd_get_the_archive_title();
		} elseif (is_search()) {
			$breadcrumb_title = esc_html__('Search Results for: ', 'leopard') . esc_html(get_search_query());
		} elseif (is_404()) {
			$breadcrumb_title = esc_html__('404', 'leopard');
		} else {
			$breadcrumb_title = get_the_title();
		}

		return $breadcrumb_title;
	}
}


/**
 * Breadcrumb area show
 */
if (!function_exists('lprd_breadcrumb_show')) {
	function lprd_breadcrumb_show() {
		if ('hide' == get_theme_mod('lprd_breadcrumb_on_off', 'show')) {
			return false;
		} else {
			return true;
		}
	}
}


/**
 * Breadcrumb
 */
if (!function_exists('lprd_breadcrumb')) {
	function lprd_breadcrumb() {
		echo '<ul class="lprd-breadcrumb-link"><li>';

		if (!(is_home() && is_front_page())) {
			printf('<a class="active" href="%s"><i class="fas fa-home"></i>' . esc_html__('Home', 'leopard') . '</a><span class="breadcrumb-sperarator"><i class="fas fa-chevron-right"></i></span>', esc_url(home_url()));
		}
		$name = get_bloginfo('name');
		$desc = get_bloginfo('description');
		//is_home means blog page.
		if (is_home() && is_front_page()) { //home page and fornt page not set
			echo esc_html($desc);
		} elseif (!is_home() && is_front_page()) { //setting fornt page.
			echo get_the_title();
		} elseif (is_home() && !is_front_page()) { //setting blog page
			$id = (get_option('page_for_posts') != '0') ? get_option('page_for_posts') : '';
			echo get_the_title($id);
		} elseif (is_search()) {
			echo esc_html__('Search Results for: ', 'leopard') . esc_html(get_search_query());
		} elseif (is_404()) {
			esc_html_e('404', 'leopard');
		} elseif (is_category()) {
			echo single_term_title();
		} elseif (is_singular()) {
			$pt_name = get_post_type(get_the_ID());
			$obj = get_post_type_object($pt_name);
			$name = str_replace(array('_', '-'), array(' ', ' '), $pt_name);
			if (is_single()) {
				echo get_the_title();
			} elseif (is_page()) {
				echo get_the_title();
			} else {
				echo esc_html($name);
			}
		} elseif (is_archive()) {
			echo lprd_get_the_archive_title();
		}
		echo '</li></ul>';
	}
}


/**
 * Preloader
 */
if (!function_exists('lprd_preloader')) {
	function lprd_preloader() {
		$preloader = get_theme_mod('lprd_preloader_on_off');
		if ($preloader != 'hide'):
			?>
			<div class="lprd-preloader">
				<div class="dash uno"></div>
				<div class="dash dos"></div>
				<div class="dash tres"></div>
				<div class="dash cuatro"></div>
			</div>

		<?php endif;
	}
	add_action('wp_body_open', 'lprd_preloader');
}
