<?php
/**
 * Shows the sidebar content.
 *
 */

/****************************************************************************************/

add_action( 'blogify_left_sidebar', 'blogify_display_left_sidebar', 10 );
/**
 * Show widgets of left sidebar.
 *
 * Shows all the widgets that are dragged and dropped on the left Sidebar.
 */
function blogify_display_left_sidebar() {
	// Calling the left sidebar if it exists.
	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'blogify_left_sidebar' ) ):
	endif;
}

/****************************************************************************************/

add_action( 'blogify_right_sidebar', 'blogify_display_right_sidebar', 10 );
/**
 * Show widgets of right sidebar.
 *
 * Shows all the widgets that are dragged and dropped on the right Sidebar.
 */
function blogify_display_right_sidebar() {
	// Calling the right sidebar if it exists.
	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'blogify_right_sidebar' ) ):
	endif;
}

/****************************************************************************************/

add_action( 'blogify_footer_widget', 'blogify_display_footer_widget', 10 );
/**
 * Show widgets on Footer of the theme.
 *
 * Shows all the widgets that are dragged and dropped on the Footer Sidebar.
 */
function blogify_display_footer_widget() {
	if( is_active_sidebar( 'blogify_footer_widget' ) ) {
		?>
		<div class="widget-wrap">
			<div class="container">
				<div class="widget-area clearfix">
				<?php
					// Calling the footer sidebar if it exists.
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'blogify_footer_widget' ) ):
					endif;
				?>
				</div><!-- .widget-area -->
			</div><!-- .container -->
		</div><!-- .widget-wrap -->
		<?php
	}
}

?>