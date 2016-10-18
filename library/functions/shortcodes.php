<?php
/**
 * Display a link back to the site.
 *
 * @uses get_bloginfo() Gets the site link
 * @return string
 */
function blogify_site_link() {
   return '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';
}

/**
 * Display a link to WordPress.org.
 *
 * @return string
 */
function blogify_wp_link() {
   return '<a href="'.esc_url( 'http://wordpress.org' ).'" target="_blank" title="' . esc_attr__( 'WordPress', 'blogify' ) . '"><span>' . __( 'WordPress', 'blogify' ) . '</span></a>';
}

/**
 * Display a link to Invendio.com.
 *
 * @return string
 */
function blogify_Invendio_link() {
   return '<a href="'.esc_url( 'http://www.tripwiremagazine.com/wp/blogify/' ).'" target="_blank" title="'.esc_attr__( 'Invendio', 'blogify' ).'" ><span>'.__( 'Invendio', 'blogify') .'</span></a>';
}

?>