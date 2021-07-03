<?php




/**
 * Body Custom Class
 */
if (!function_exists('lprd_add_body_class')) {
	add_filter('body_class', 'lprd_add_body_class');
	function lprd_add_body_class( $classes ) {

		if ( is_active_sidebar('sidebar-1') ) {
			$classes[] = 'lprd-sidebar-enable';
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
	$text_1 = esc_html__('404', 'pawshop');
	$text_2 = esc_html__('Oops! page not found.', 'pawshop');
	$text_3 = esc_html__('Sorry, but the page you are looking for is not found. Please, make sure you have typed the current URL.', 'pawshop');
	$text_4 = esc_url(home_url('/'));
	$text_5 = esc_html__('Back to Home', 'pawshop');
	echo sprintf('<div class="lprd-404-content"><h1>%1$s</h1><h2>%2$s</h2><p>%3$s</p><a class="lprd-default-btn lprd-404-btn" href="%4$s">%5$s<i class="fas fa-arrow-right"></i></a></div>', $text_1, $text_2, $text_3, $text_4, $text_5);
}


/**
 * Function for ekoo
 */
if (!function_exists('pws_ekoo')) {
	function pws_ekoo($item) {
		return $item;
	}
}

/**
 * Function for Allow HTML Tag
 */
if (!function_exists('pws_allowed_html')) {
	function pws_allowed_html($string) {
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
 * Function for convert Hex To Rgb Color
 */
if (!function_exists('pws_HexToRgb')) {
	function pws_HexToRgb($hex, $alpha = '', $type = 'string') {
		if (!empty($hex) && strpos($hex, '#') != 0) {
			return;
		}
		$hex = str_replace('#', '', $hex);
		$length = strlen($hex);
		$rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
		$rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
		$rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
		if (!empty($alpha)) {
			$rgb['a'] = $alpha;
		}
		if ($type == 'string') {
			if (!empty($alpha)) {
				$rgb = 'rgba(' . implode(', ', $rgb) . ')';
			} else {
				$rgb = 'rgb(' . implode(', ', $rgb) . ')';
			}
		}
		return $rgb;
	}
}

/**
 * Function for custom excerpt
 */
if (!function_exists('pws_excerpt')) {
	function pws_excerpt($sl_length = '', $sl_sign = '') {

		if (empty($sl_length)) {
			$length = apply_filters('pws_excerpt_length', 23);
		} else {
			$length = $sl_length;
		}

		if (empty($sl_sign)) {
			$more = apply_filters('pws_excerpt_more', '');
		} else {
			$more = $sl_sign;
		}

		printf('<p>%1$s</p>',
			wp_trim_words(get_the_content(), $length, $more)
		);
	}
}

/**
 * Register Google fonts.
 */
if (!function_exists('pws_fonts_url')) {
	function pws_fonts_url() {
		$fonts_url = '';
		$fonts = array();
		$subsets = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== _x('on', 'Roboto: on or off', 'pawshop')) {
			$fonts[] = 'Roboto:200,400,500,600';
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
 * Function for Meta option
 */
if (!function_exists('pws_page_meta')) {
	function pws_page_meta($uniq_id) {
		if (defined('CMB2_LOADED') && !is_home() && !is_archive() && !is_search() && !is_404()) {
			return get_post_meta(get_the_ID(), $uniq_id, true);
		} else {
			return '';
		}
	}
}

/**
 * Function for Page Layout Option
 */
if (!function_exists('pws_page_layout')) {
	function pws_page_layout() {
		$pws_customizer = get_theme_mod('pws_page_layout', 'right');
		$page_layout_option = pws_page_meta('_pws_page_layout_option');
		$pws_page = !empty($page_layout_option) ? $page_layout_option : 'default';
		$layout = $pws_page;
		if (empty($layout) || $layout == 'default') {
			$layout = $pws_customizer;
		}
		if (!is_active_sidebar('sidebar-1')) {
			$layout = 'without';
		}
		return $layout;
	}
}

/**
 * Function for default blog paginations
 */
if (!function_exists('pws_blog_paginations')) {

	function pws_blog_paginations() {
		$args = array(
			'prev_text' => '<i class="ti-angle-left"></i>',
			'next_text' => '<i class="ti-angle-right"></i>',
			'type' => 'list'
		);
		echo paginate_links($args);
	}
}

/**
 * Function for default blog paginations2
 */
if (!function_exists('pws_blog_paginations2')) {

	function pws_blog_paginations2($the_query = '') {
		if (empty($the_query)) {
			global $wp_query;
			$the_query = $wp_query;
		}
		$big = 999999999; // need an unlikely integer
		$html = paginate_links(array(
			'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format' => '/page/%#%',
			'current' => max(1, get_query_var('paged')),
			'total' => $the_query->max_num_pages,
			'end_size' => 2,
			'prev_text' => '<i class="mdi mdi-chevron-left"></i>',
			'next_text' => '<i class="mdi mdi-chevron-right"></i>',
		));
		$pretext = '<i class="mdi mdi-chevron-left"></i>';
		$posttext = '<i class="mdi mdi-chevron-right"></i>';
		$pre_deco = '<a href="" class="prev page-numbers custom">' . $pretext . '</a>';
		$post_deco = '<a href="" class="next page-numbers custom">' . $posttext . '</a>';
		$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
		if (1 === $paged) {
			$html = $pre_deco . $html;
		}
		if ($the_query->max_num_pages == $paged) {
			$html = $html . $post_deco;
		}
		if (1 != $the_query->max_num_pages && 0 != $the_query->max_num_pages) {
			echo '<div class="custom-pagination">' . pws_allowed_html($html) . '</div>';
		} else {
			return;
		}
	}
}

/**
 * Function for comments paginations
 */
if (!function_exists('pws_comments_paginations')) {

	function pws_comments_paginations() {
		$args = array(
			'prev_text' => '<i class="mdi mdi-chevron-left"></i>',
			'next_text' => '<i class="mdi mdi-chevron-right"></i>',
			'type' => 'list'
		);
		paginate_comments_links($args);
	}
}


/**
 * Function for blog author
 */
if (!function_exists('pws_blog_author')) {
	function pws_blog_author($style = '') {
		$span_tag = '';
		if ('style-1' == $style) {
			$span_tag = '<span>' . esc_html__('Posted By: ', 'pawshop') . '</span>';
		}
		$author_id = get_post_field('post_author', get_the_ID());
		$author_name = get_the_author_meta('display_name', $author_id);
		$url = get_author_posts_url($author_id);
		$author = '<div class="author">' . $span_tag . '<a href="' . esc_url($url) . '">' . esc_html($author_name) . '</a></div>';
		print_r($author);
	}
}

/**
 * Function for post date
 */
if (!function_exists('pws_post_on')) {
	function pws_post_on($style = '') {
		$span_tag = '';
		if ('style-1' == $style) {
			$span_tag = '<span>' . esc_html__('Posted : ', 'pawshop') . '</span>';
		}
		$year = get_the_date('Y');
		$month = get_the_time('m');
		$day = get_the_time('d');
		$url = get_day_link($year, $month, $day);
		$date = '<div class="date">' . $span_tag . '<a href="' . esc_url($url) . '">' . esc_html(get_the_date('M d, Y')) . '</a></div>';
		print_r($date);
	}
}

/**
 * Function for post categories list
 */
if (!function_exists('pws_cat_list')) {

	function pws_cat_list($style = '', $space = ', ') {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list($space);
		$span_tag = '';
		if ('style-1' == $style) {
			$span_tag = '<span>' . esc_html__('Categories: ', 'pawshop') . '</span>';
		}
		if ($categories_list) {
			/* translators: 1: list of categories. */
			printf('<div class="cat-links">%1$s %2$s</div>', $span_tag, $categories_list);
		}
	}
}

/**
 * Function for post's single category
 */
if (!function_exists('pws_single_cat')) {
	function pws_single_cat($style = '') {
		$span_tag = '';
		if ('style-1' == $style) {
			$span_tag = '<span>' . esc_html__('Category: ', 'pawshop') . '</span>';
		}
		$cats = get_the_category(get_the_ID());
		if (!empty($cats) && isset($cats[0]->name)) {
			printf('<div class="single-cat">%1$s<a href="%2$s" class="cat-links">%3$s</a></div>', $span_tag, get_category_link($cats[0]->term_id), esc_html($cats[0]->name));
		}
	}
}

/**
 * Function for post tags list
 */
if (!function_exists('pws_tags_list')) {

	function pws_tags_list($style = '') {
		if ('style-1' == $style) {
			$span_tag = '<span>' . esc_html__('Tag: ', 'pawshop') . '</span>';
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
 * Function for get comment number
 */
if (!function_exists('pws_get_comment_number')) {

	function pws_get_comment_number($style = '', $link = true) {
		$number = get_comments_number(get_the_ID());
		if ('style-1' == $style) {
			$span_tag = '<span>' . esc_html__('Comments', 'pawshop') . '</span>';
		} else {
			$span_tag = '';
		}
		if ($link == true) {
			printf('<div class="comments-number"><a href="%1$s">%2$s</a></div>', get_comments_link(), $number . ' ' . $span_tag);
		} else {
			printf('<div class="comments-number">%1$s%2$s</div>', $number, $span_tag);
		}
	}
}

/**
 * Custom Archive Title modifier
 */
if (!function_exists('pws_get_the_archive_title')) {
	function pws_get_the_archive_title() {

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
			$title = get_the_date(_x('Y', 'yearly archives date format', 'pawshop'));
		} elseif (is_month()) {
			/* translators: Monthly archive title. 1: Month name and year */
			$title = get_the_date(_x('F Y', 'monthly archives date format', 'pawshop'));
		} elseif (is_day()) {
			/* translators: Daily archive title. 1: Date */
			$title = get_the_date(_x('F j, Y', 'daily archives date format', 'pawshop'));
		} elseif (is_post_type_archive()) {
			/* translators: Post type archive title. 1: Post type name */
			$title = post_type_archive_title('', false);
			if (is_shop()) {
				$title = woocommerce_page_title();
			}
		} elseif (is_tax()) {
			$tax = get_taxonomy(get_queried_object()->taxonomy);
			/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf(__('%1$s: %2$s', 'pawshop'), $tax->labels->singular_name, single_term_title('', false));
		} else {
			$title = esc_html__('Archives', 'pawshop');
		}

		/**
		 * Filters the archive title.
		 *
		 * @param string $title Archive title to be displayed.
		 */
		return apply_filters('pws_get_the_archive_title', $title);
	}
}

/**
 * Function for breadcrumb title
 */
if (!function_exists('pws_breadcrumb_title')) {
	function pws_breadcrumb_title() {

		if (is_home() && is_front_page()) {
			$breadcrumb_title = esc_html(get_bloginfo('title'));
		} elseif (is_home() && !is_front_page()) {
			$breadcrumb_title = get_the_title(get_option('page_for_posts'));
		} elseif (is_archive()) {
			$breadcrumb_title = pws_get_the_archive_title();
		} elseif (is_search()) {
			$breadcrumb_title = esc_html__('Search Results for: ', 'pawshop') . esc_html(get_search_query());
		} elseif (is_404()) {
			$breadcrumb_title = esc_html__('404', 'pawshop');
		} else {
			$breadcrumb_title = get_the_title();
		}

		return $breadcrumb_title;
	}
}

/**
 * Breadcrumb
 */
if (!function_exists('pws_breadcrumb')) {
	function pws_breadcrumb() {
		echo '<ul class="pws-breadcrumb-link"><li>';

		if (!(is_home() && is_front_page())) {
			printf("<a class='active' href='%s'>" . esc_html__('Home', 'pawshop') . "</a><span class='breadcrumb-sperarator'><i class='mdi mdi-chevron-right'></i></span>", esc_url(home_url()));
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
			esc_html_e('Search Page', 'pawshop');
		} elseif (is_404()) {
			esc_html_e('404', 'pawshop');
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
			echo pws_get_the_archive_title();
		}
		echo '</li></ul>';
	}
}

/**
 * Breadcrumb area on/off
 */
if (!function_exists('pws_breadcrumb_on_off')) {
	function pws_breadcrumb_on_off() {
		$pws_customizer = get_theme_mod('pws_breadcrumb_on_off', 'show');
		$page_breadcrumb_option = pws_page_meta('_pws_breadcrumbs_on_off');
		$pws_page = !empty($page_breadcrumb_option) ? $page_breadcrumb_option : 'default';
		$on_off = $pws_page;
		if ($on_off == 'show' || $on_off == 'hide') {
			return $on_off;
		} else {
			$on_off = $pws_customizer;
		}
		return $on_off;
	}
}


/**
 * get_wysiwyg_output
 */
if (!function_exists('pws_get_wysiwyg_output')) {
	function pws_get_wysiwyg_output($meta_key) {
		global $wp_embed;

		$content = $wp_embed->autoembed($meta_key);
		$content = $wp_embed->run_shortcode($content);
		$content = do_shortcode($content);
		$content = wpautop($content);

		return $content;
	}
}


/**
 * Add content to the 404 page
 *
 */
add_action('pws_404_page_content_markup', 'pws_404_page_content');
function pws_404_page_content() {
	$text_1 = esc_html__('404', 'pawshop');
	$text_2 = esc_html__('Oops! page not found.', 'pawshop');
	$text_3 = esc_html__('Sorry, but the page you are looking for is not found. Please, make sure you have typed the current URL.', 'pawshop');
	$text_4 = esc_url(home_url('/'));
	$text_5 = esc_html__('Back to Home', 'pawshop');
	echo sprintf('<div class="pws-404-content"><h1>%1$s</h1><h2>%2$s</h2><p>%3$s</p><a class="pws_default_btn pws-404-btn" href="%4$s">%5$s<i class="mdi mdi-arrow-right"></i></a></div>', $text_1, $text_2, $text_3, $text_4, $text_5);
}


/**
 * One Click Demo Import Functions
 */
if (class_exists('OCDI_Plugin')) {
	if (!function_exists('pws_demo_import_func')) {
		function pws_demo_import_func() {
			return array(
				array(
					'import_file_name' => __('Pawshop Demo Data', 'pawshop'),
					'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-data/content.xml',
					'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-data/widgets.wie',
					'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-data/customizer.dat',

					'import_notice' => __('<p><sub style="color: red;font-size: 2em;vertical-align: middle;top: 2px;position: relative;margin-right: 5px;">*</sub>Import process might take several minutes depending on your server configuration. Please wait till it shows confirmation message.</p><p></p>', 'pawshop'),
				),
			);
		}

		add_filter('pt-ocdi/import_files', 'pws_demo_import_func');
	}

	if (!function_exists('pws_demo_page_setting')) {
		function pws_demo_page_setting() {
			// Assign menus to their locations.
			$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
			$footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');

			set_theme_mod('nav_menu_locations', array(
					'pawshop-header-menu' => $main_menu->term_id,
					'pawshop-footer-menu' => $footer_menu->term_id,
				)
			);

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title('Home');
			$blog_page_id = get_page_by_title('Blog');

			update_option('show_on_front', 'page');
			update_option('elementor_disable_color_schemes', 'yes');
			update_option('elementor_disable_typography_schemes', 'yes');
			update_option('elementor_container_width', '1170');
			update_option('elementor_space_between_widgets', '0');
			update_option('elementor_load_fa4_shim', 'yes');
			if (isset($front_page_id->ID)) {
				update_option('page_on_front', $front_page_id->ID);
			}
			if (isset($blog_page_id->ID)) {
				update_option('page_for_posts', $blog_page_id->ID);
			}

		}

		add_action('pt-ocdi/after_import', 'pws_demo_page_setting');
	}

	/*
	* Disable Success Message
	*/
	add_filter('pt-ocdi/disable_pt_branding', '__return_true');
}
