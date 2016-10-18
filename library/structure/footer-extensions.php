<?php
/**
 * Adds footer structures.
 *
 */

/****************************************************************************************/

add_action( 'blogify_footer', 'blogify_footer_widget_area', 10 );
/**
 * Displays the footer widgets
 */
function blogify_footer_widget_area() {
	get_sidebar( 'footer' );
}

/****************************************************************************************/

add_action( 'blogify_footer', 'blogify_open_sitegenerator_div', 20 );
/**
 * Opens the site generator div.
 */
function blogify_open_sitegenerator_div() {
	echo '<div id="site-generator">
				<div class="container">';
}

/****************************************************************************************/

add_action( 'blogify_footer', 'blogify_footer_info', 30 );
/**
 * function to show the footer info, copyright information
 */
function blogify_footer_info() {
   echo '<div class="copyright">'.__( 'Copyright &copy;', 'blogify' ).' '.date('Y').' '.blogify_site_link().'. '.__( 'Theme by', 'blogify' ).' '.blogify_Invendio_link().' '.__( 'Powered by', 'blogify' ).' '.blogify_wp_link().'</div><!-- .copyright -->';
}

/****************************************************************************************/

add_action( 'blogify_footer', 'blogify_close_sitegenerator_div', 35 );


/**
 * add content to the right side of footer
 */
function blogify_footer_rightinfo() {
		echo '<div class="footer-right">';
		echo get_theme_mod( 'blogify_footer_textbox' );
		echo '</div>';
}
add_action( 'blogify_footer', 'blogify_footer_rightinfo', 30 );

/**
 * Closes the site generator div.
 */
function blogify_close_sitegenerator_div() {
	echo '<div style="clear:both;"></div>
			</div><!-- .container -->
			</div><!-- #site-generator -->';
}

/****************************************************************************************/

add_action( 'blogify_footer', 'blogify_backtotop_html', 40 );
/**
 * Shows the back to top icon to go to top.
 */
function blogify_backtotop_html() {
	echo '<div class="back-to-top"><a href="#branding"></a></div>';
}

?>