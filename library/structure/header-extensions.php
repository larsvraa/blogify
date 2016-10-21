<?php
/**
 * Adds header structures.
 *
 */

/****************************************************************************************/

add_action( 'wp_head', 'blogify_add_meta', 5 );
/**
 * Add meta tags.
 */
function blogify_add_meta() {
?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
}

/****************************************************************************************/

add_action( 'blogify_links', 'blogify_add_links', 10 );
/**
 * Adding link to stylesheet file
 *
 * @uses get_stylesheet_uri()
 */
function blogify_add_links() {
?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
}

/****************************************************************************************/

add_action( 'blogify_header', 'blogify_headerdetails', 10 );
/**
 * Shows Header Part Content
 *
 * Shows the site logo, title, description, searchbar, social icons etc.
 */
function blogify_headerdetails() {
?>
	<?php
		global $blogify_theme_options_settings;
   	$options = $blogify_theme_options_settings;

   	$elements = array();
		$elements = array(
			$options[ 'social_facebook' ],
			$options[ 'social_twitter' ],
			$options[ 'social_googleplus' ],
			$options[ 'social_linkedin' ],
			$options[ 'social_pinterest' ],
			$options[ 'social_youtube' ],
			$options[ 'social_vimeo' ],
			$options[ 'social_flickr' ],
			$options[ 'social_tumblr' ],
			$options[ 'social_instagram' ],
			$options[ 'social_rss' ],
			$options[ 'social_github' ]
		);

		$flag = 0;
		if( !empty( $elements ) ) {
			foreach( $elements as $option) {
				if( !empty( $option ) ) {
					$flag = 1;
				}
				else {
					$flag = 0;
				}
				if( 1 == $flag ) {
					break;
				}
			}
		}
	?>

	<div class="container clearfix">
		<div class="hgroup-wrap clearfix">
					<section class="hgroup-right">
						<?php blogify_socialnetworks( $flag ); ?>
					</section><!-- .hgroup-right -->
				<hgroup id="site-logo" class="clearfix">
					<?php
						if( $options[ 'header_show' ] != 'disable-both' && $options[ 'header_show' ] == 'header-text' ) {
						?>
							<h1 id="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
							<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php
						}
						elseif( $options[ 'header_show' ] != 'disable-both' && $options[ 'header_show' ] == 'header-logo' ) {
						?>
							<h1 id="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<img src="<?php echo $options[ 'header_logo' ]; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
								</a>
							</h1>
						<?php
						}
						?>

				</hgroup><!-- #site-logo -->

		</div><!-- .hgroup-wrap -->
	</div><!-- .container -->
	<?php $header_image = get_header_image();
			if( !empty( $header_image ) ) :?>
				<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			<?php endif; ?>
	<?php
		if ( has_nav_menu( 'primary' ) ) {
			$args = array(
				'theme_location'    => 'primary',
				'container'         => '',
				'items_wrap'        => '<ul class="root">%3$s</ul>'
			);
			echo '<nav id="main-nav" class="clearfix">
					<div class="container clearfix">';
				wp_nav_menu( $args );
			echo '</div><!-- .container -->
					</nav><!-- #main-nav -->';
		}
		else {
			echo '<nav id="main-nav" class="clearfix">
					<div class="container clearfix">';
				wp_page_menu( array( 'menu_class'  => 'root' ) );
			echo '</div><!-- .container -->
					</nav><!-- #main-nav -->';
		}
	?>
		<?php
		if( is_home() || is_front_page() ) {

			if( "0" == $options[ 'disable_slider' ] ) {
				if( function_exists( 'blogify_pass_cycle_parameters' ) )
   				blogify_pass_cycle_parameters();

			}


 

   			if( function_exists( 'blogify_featured_post_slider' ) )
   				blogify_featured_post_slider();

			slimpy_call_for_action();
   		}



		else {
			if( ( '' != blogify_header_title() ) || function_exists( 'bcn_display_list' ) ) {
		?>
			<div class="page-title-wrap">
	    		<div class="container clearfix">
	    			<?php
		    		if( function_exists( 'blogify_breadcrumb' ) )
						blogify_breadcrumb();
					?>
				   <h3 class="page-title"><?php echo blogify_header_title(); ?></h3><!-- .page-title -->
				</div>
	    	</div>
	   <?php
	   	}
		}
}


 
 

/****************************************************************************************/

if ( ! function_exists( 'blogify_socialnetworks' ) ) :
/**
 * This function for social links display on header
 *
 * Get links through Theme Options
 */
function blogify_socialnetworks( $flag ) {

	global $blogify_theme_options_settings;
   $options = $blogify_theme_options_settings;

	$blogify_socialnetworks = '';
	if ( ( !$blogify_socialnetworks = get_transient( 'blogify_socialnetworks' ) ) && ( 1 == $flag ) )  {

		$blogify_socialnetworks .='
			<div class="social-icons clearfix">
				<ul>';

				$social_links = array(
					'Facebook'    => 'social_facebook',
					'Twitter'     => 'social_twitter',
					'Google-Plus' => 'social_googleplus',
					'Pinterest'   => 'social_pinterest',
					'YouTube'     => 'social_youtube',
					'Vimeo'       => 'social_vimeo',
					'LinkedIn'    => 'social_linkedin',
					'Flickr'      => 'social_flickr',
					'Tumblr'      => 'social_tumblr',
					'Instagram'   => 'social_instagram',
					'RSS'         => 'social_rss',
					'GitHub'      => 'social_github'
				);

				foreach( $social_links as $key => $value ) {
					if ( !empty( $options[ $value ] ) ) {
						$blogify_socialnetworks .=
							'<li class="'.strtolower($key).'"><a href="'.esc_url( $options[ $value ] ).'" title="'.sprintf( esc_attr__( '%1$s on %2$s', 'blogify' ), get_bloginfo( 'name' ), $key ).'" target="_blank"></a></li>';
					}
				}

				$blogify_socialnetworks .='
			</ul>
			</div><!-- .social-icons -->';

		set_transient( 'blogify_socialnetworks', $blogify_socialnetworks, 86940 );
	}
	echo $blogify_socialnetworks;
}
endif;


/****************************************************************************************/

if ( ! function_exists( 'blogify_featured_post_slider' ) ) :
/**
 * display featured post slider
 *
 */
function blogify_featured_post_slider() {
	global $post;

	global $blogify_theme_options_settings;
  	$options = $blogify_theme_options_settings;

  $blogify_featured_post_slider = '';
	if (!empty( $options[ 'featured_post_slider' ] ) ) {
		$blogify_featured_post_slider .= '
		<section class="featured-slider"><div class="slider-cycle">';
			$get_featured_posts = new WP_Query( array(
				'posts_per_page' 		    => $options[ 'slider_quantity' ],
				'post_type'					    => array( 'post', 'page' ),
				'post__in'		 			    => $options[ 'featured_post_slider' ],
				'orderby' 		 			    => 'post__in',
				'suppress_filters' 	    => false,
				'ignore_sticky_posts' 	=> 1 						// ignore sticky posts
			));
			$i=0; while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
				$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
				$excerpt = get_the_excerpt();
				if ( 1 == $i ) { $classes = "slides displayblock"; } else { $classes = "slides displaynone"; }
				$blogify_featured_post_slider .= '
				<div class="'.$classes.'">';
						if( has_post_thumbnail() ) {

							$blogify_featured_post_slider .= '<figure><a href="' . get_permalink() . '" title="'.the_title('','',false).'">';

							$blogify_featured_post_slider .= get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'	=> 'pngfix' ) ).'</a></figure>';
						}
						if( $title_attribute != '' || $excerpt !='' ) {
						$blogify_featured_post_slider .= '
							<article class="featured-text">';
							if( $title_attribute !='' ) {
									$blogify_featured_post_slider .= '<div class="featured-title"><a href="' . get_permalink() . '" title="'.the_title('','',false).'">'. get_the_title() . '</a></div><!-- .featured-title -->';
							}
							if( $excerpt !='' ) {
								$blogify_featured_post_slider .= '<div class="featured-content">'.$excerpt.'</div><!-- .featured-content -->';
							}
						$blogify_featured_post_slider .= '
							</article><!-- .featured-text -->';
						}
				$blogify_featured_post_slider .= '
				</div><!-- .slides -->';
			endwhile; wp_reset_query();
		$blogify_featured_post_slider .= '</div>
		<nav id="controllers" class="clearfix">
		</nav><!-- #controllers --></section><!-- .featured-slider -->';
	}
	echo $blogify_featured_post_slider;
}
endif;

/****************************************************************************************/

if ( ! function_exists( 'blogify_breadcrumb' ) ) :
/**
 * Display breadcrumb on header.
 *
 * If the page is home or front page, slider is displayed.
 * In other pages, breadcrumb will display if breadcrumb NavXT plugin exists.
 */
function blogify_breadcrumb() {
	if( function_exists( 'bcn_display_list' ) ) {
		echo '<div class="breadcrumb">
		<ul>';
		bcn_display_list();
		echo '</ul>
		</div> <!-- .breadcrumb -->';
	}

}
endif;

if ( ! function_exists( 'slimpy_call_for_action' ) ) :
/**
 * Call for action text and button displayed above content
 */
function slimpy_call_for_action() {
  if ( is_front_page() && of_get_option( 'w2f_cfa_text' )!=''){
    echo '<div class="cfa">';
      echo '<div class="container">';
        echo '<div class="col-sm-8">';
          echo '<span class="cfa-text">'. of_get_option( 'w2f_cfa_text' ).'</span>';
          echo '</div>';
          echo '<div class="col-sm-4">';
          echo '<a class="btn btn-lg cfa-button" href="'. of_get_option( 'w2f_cfa_link' ). '">'. of_get_option( 'w2f_cfa_button' ). '</a>';
          echo '</div>';
      echo '</div>';
    echo '</div>';
  }
}
endif;


/****************************************************************************************/

if ( ! function_exists( 'blogify_header_title' ) ) :
/**
 * Show the title in header
 */
function blogify_header_title() {
	if( is_archive() ) {
		$blogify_header_title = single_cat_title( '', FALSE );
	}
	elseif( is_search() ) {
		$blogify_header_title = __( 'Search Results', 'blogify' );
	}
	elseif( is_page_template()  ) {
		$blogify_header_title = get_the_title();
	}
	else {
		$blogify_header_title = '';
	}

	return $blogify_header_title;

}
endif;
?>