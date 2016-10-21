<?php
/**
 * blogify functions and definitions
 *
 * This file contains all the functions and it's definition that particularly can't be
 * in other files.
 *
 */

/****************************************************************************************/

add_action( 'wp_enqueue_scripts', 'blogify_scripts_styles_method' );
/**
 * Register jquery scripts
 */
function blogify_scripts_styles_method() {

	global $blogify_theme_options_settings;
	$options = $blogify_theme_options_settings;

   /**
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'blogify_style', get_stylesheet_uri() );

	if( is_rtl() ) {
		wp_enqueue_style( 'blogify-rtl-style', get_template_directory_uri() . '/rtl.css', false );
	}

	/**
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/**
	 * Register JQuery cycle js file for slider.
	 * Register Jquery fancybox js and css file for fancybox effect.
	 */
	wp_register_script( 'jquery_cycle', get_template_directory_uri() . '/library/js/jquery.cycle.all.min.js', array( 'jquery' ), '2.9999.5', true );

	wp_register_style( 'google_font_ubuntu', '//fonts.googleapis.com/css?family=Ubuntu' );


	/**
	 * Enqueue Slider setup js file.
	 * Enqueue Fancy Box setup js and css file.
	 */
	if( ( is_home() || is_front_page() ) && "0" == $options[ 'disable_slider' ] ) {
		wp_enqueue_script( 'blogify_slider', get_template_directory_uri() . '/library/js/slider-settings.min.js', array( 'jquery_cycle' ), false, true );
	}

	wp_enqueue_script( 'theme_functions', get_template_directory_uri() . '/library/js/functions.min.js', array( 'jquery' ) );

	wp_enqueue_style( 'google_font_ubuntu' );

   /**
    * Browser specific queuing i.e
    */
	$blogify_user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(preg_match('/(?i)msie [1-8]/',$blogify_user_agent)) {
		wp_enqueue_script( 'html5', get_template_directory_uri() . '/library/js/html5.js', true );
	}



}

/****************************************************************************************/

add_filter( 'wp_page_menu', 'blogify_wp_page_menu' );
/**
 * Remove div from wp_page_menu() and replace with ul.
 * @uses wp_page_menu filter
 */
function blogify_wp_page_menu ( $page_markup ) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
	$divclass = $matches[1];
	$replace = array('<div class="'.$divclass.'">', '</div>');
	$new_markup = str_replace($replace, '', $page_markup);
	$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
	return $new_markup;
}

/****************************************************************************************/

if ( ! function_exists( 'blogify_pass_cycle_parameters' ) ) :
/**
 * Function to pass the slider effectr parameters from php file to js file.
 */
function blogify_pass_cycle_parameters() {

    global $blogify_theme_options_settings;
    $options = $blogify_theme_options_settings;

		$transition_effect   = $options[ 'transition_effect' ];
		$transition_delay    = $options[ 'transition_delay' ] * 1000;
		$transition_duration = $options[ 'transition_duration' ] * 1000;
    wp_localize_script(
        'blogify_slider',
        'blogify_slider_value',
        array(
						'transition_effect'   => $transition_effect,
						'transition_delay'    => $transition_delay,
						'transition_duration' => $transition_duration
        )
    );

}
endif;

/****************************************************************************************/

add_filter( 'excerpt_length', 'blogify_excerpt_length' );
/**
 * Sets the post excerpt length to 30 words.
 *
 * function tied to the excerpt_length filter hook.
 *
 * @uses filter excerpt_length
 */
function blogify_excerpt_length( $length ) {
	return 40;
}

add_filter( 'excerpt_more', 'blogify_continue_reading' );
/**
 * Returns a "Continue Reading" link for excerpts
 */
function blogify_continue_reading() {
	return '&hellip; ';
}

/****************************************************************************************/

add_filter( 'body_class', 'blogify_body_class' );
/**
 * Filter the body_class
 *
 * Throwing different body class for the different layouts in the body tag
 */
function blogify_body_class( $classes ) {
	global $post;
	global $blogify_theme_options_settings;
	$options = $blogify_theme_options_settings;

	if( $post ) {
		$layout = get_post_meta( $post->ID,'blogify_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	}
	if( 'default' == $layout ) {

		$themeoption_layout = $options[ 'default_layout' ];

		if( 'left-sidebar' == $themeoption_layout ) {
			$classes[] = 'left-sidebar-template';
		}
		elseif( 'right-sidebar' == $themeoption_layout  ) {
			$classes[] = '';
		}
		elseif( 'no-sidebar-full-width' == $themeoption_layout ) {
			$classes[] = '';
		}
		elseif( 'no-sidebar-one-column' == $themeoption_layout ) {
			$classes[] = 'one-column-template';
		}
		elseif( 'no-sidebar' == $themeoption_layout ) {
			$classes[] = 'no-sidebar-template';
		}
	}
	elseif( 'left-sidebar' == $layout ) {
      $classes[] = 'left-sidebar-template';
   }
   elseif( 'right-sidebar' == $layout ) {
		$classes[] = '';
	}
	elseif( 'no-sidebar-full-width' == $layout ) {
		$classes[] = '';
	}
	elseif( 'no-sidebar-one-column' == $layout ) {
		$classes[] = 'one-column-template';
	}
	elseif( 'no-sidebar' == $layout ) {
		$classes[] = 'no-sidebar-template';
	}

	if( is_page_template( 'page-blog-medium-image.php' ) ) {
		$classes[] = 'blog-medium';
	}


	return $classes;
}

/****************************************************************************************/

add_action('wp_head', 'blogify_internal_css');
/**
 * Hooks the Custom Internal CSS to head section
 */
function blogify_internal_css() {

	if ( ( !$blogify_internal_css = get_transient( 'blogify_internal_css' ) ) ) {

		global $blogify_theme_options_settings;
		$options = $blogify_theme_options_settings;

		if( !empty( $options[ 'custom_css' ] ) ) {
			$blogify_internal_css = '<!-- '.get_bloginfo('name').' Custom CSS Styles -->' . "\n";
			$blogify_internal_css .= '<style type="text/css" media="screen">' . "\n";
			$blogify_internal_css .=  $options['custom_css'] . "\n";
			$blogify_internal_css .= '</style>' . "\n";
		}

		set_transient( 'blogify_internal_css', $blogify_internal_css, 86940 );
	}
	echo $blogify_internal_css;
}


/****************************************************************************************/

add_action('template_redirect', 'blogify_feed_redirect');
/**
 * Redirect WordPress Feeds To FeedBurner
 */
function blogify_feed_redirect() {
	global $blogify_theme_options_settings;
	$options = $blogify_theme_options_settings;

	if ( !empty( $options['feed_url'] ) ) {
		$url = 'Location: '.$options['feed_url'];
		if ( is_feed() && !preg_match('/feedburner|feedvalidator/i', $_SERVER['HTTP_USER_AGENT'])) {
			header($url);
			header('HTTP/1.1 302 Temporary Redirect');
		}
	}
}

/****************************************************************************************/

add_action( 'pre_get_posts','blogify_alter_home' );
/**
 * Alter the query for the main loop in home page
 *
 * @uses pre_get_posts hook
 */
function blogify_alter_home( $query ){
	global $blogify_theme_options_settings;
	$options = $blogify_theme_options_settings;
	$cats = $options[ 'front_page_category' ];

	if ( $options[ 'exclude_slider_post'] != "0" && !empty( $options[ 'featured_post_slider' ] ) ) {
		if( $query->is_main_query() && $query->is_home() ) {
			$query->query_vars['post__not_in'] = $options[ 'featured_post_slider' ];
		}
	}

	if ( !in_array( '0', $cats ) ) {
		if( $query->is_main_query() && $query->is_home() ) {
			$query->query_vars['category__in'] = $options[ 'front_page_category' ];
		}
	}
}


/****************************************************************************************/

add_filter('wp_page_menu', 'blogify_wp_page_menu_filter');
/**
 * @uses wp_page_menu filter hook
 */
if ( !function_exists('blogify_wp_page_menu_filter') ) {
	function blogify_wp_page_menu_filter( $text ) {
		$replace = array(
			'current_page_item' => 'current-menu-item'
	 	);

	  $text = str_replace(array_keys($replace), $replace, $text);
	  return $text;
	}
}

/**************************************************************************************/

/**
 * WooCommerce
 *
 * Unhook/Hook the WooCommerce Wrappers
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'responsive_woocommerce_wrapper', 10);
add_action('woocommerce_after_main_content', 'responsive_woocommerce_wrapper_end', 10);

function responsive_woocommerce_wrapper() {
  echo '<div id="content-woocommerce" class="main">';
}

function responsive_woocommerce_wrapper_end() {
  echo '</div><!-- end of #content-woocommerce -->';
}

/**************************************************************************************/

/**
 * Function to register the widget areas(sidebar) and widgets.
 */
function blogify_widgets_init() {

	// Registering main left sidebar
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'blogify' ),
		'id'            => 'blogify_left_sidebar',
		'description'   => __( 'Shows widgets at Left side.', 'blogify' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	// Registering main right sidebar
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'blogify' ),
		'id'            => 'blogify_right_sidebar',
		'description'   => __( 'Shows widgets at Right side.', 'blogify' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	// Registering footer widgets
	register_sidebar( array(
		'name'          => __( 'Footer', 'blogify' ),
		'id'            => 'blogify_footer_widget',
		'description'   => __( 'Shows widgets at footer.', 'blogify' ),
		'before_widget' => '<div class="col-3"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
		)
	);
}
add_action( 'widgets_init', 'blogify_widgets_init' );

/**
 * Sets up the WordPress core custom header arguments and settings.
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 * @uses blogify_header_style() to style front-end.
 * @uses blogify_admin_header_style() to style wp-admin form.
 * @uses blogify_admin_header_image() to add custom markup to wp-admin form.
 *
 */
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '',
		'default-image'          => '',

		// Set height and width, with a maximum value for the width.
		'height'                 => apply_filters( 'blogify_header_image_height', 250 ),
		'width'                  => apply_filters( 'blogify_header_image_width', 1018 ),
		'max-width'              => 1018,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,

		// No Header Text Feature
		'header-text'            => false,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => '',
		'admin-head-callback'    => 'blogify_admin_header_style',
		'admin-preview-callback' => 'blogify_admin_header_image',
	);

	add_theme_support( 'custom-header', $args );

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 */

function blogify_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg img {
		max-width: <?php echo get_theme_support( 'custom-header', 'max-width' ); ?>px;
	}
	</style>
<?php
}

/**
 * Outputs markup to be displayed on the Appearance > Header admin panel.
 * This callback overrides the default markup displayed there.
 */

function blogify_admin_header_image() {
	?>
	<div id="headimg">
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		<?php endif; ?>
	</div>

<?php }


if ( ! function_exists( 'blogify_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blogify_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	$byline = sprintf(
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' . '</span>';
}
endif;

?>