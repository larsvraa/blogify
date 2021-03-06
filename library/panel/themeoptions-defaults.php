<?php
/**
 * Contains all the theme option default values
 *
 * Set the default values for all the settings. If no user-defined values
 * is available for any setting, these defaults will be used.
 *
 */

global $blogify_theme_options_defaults;
$blogify_theme_options_defaults = array(
	'disable_slider'       => 0,
	'exclude_slider_post'  => 0,
	'default_layout'       => 'right-sidebar',
	'reset_layout'         => 0,
	'custom_css'           => '',
	'slider_quantity'      => '4',
	'featured_post_slider' => array(),
	'transition_effect'    => 'fade',
	'transition_delay'     => '4',
	'transition_duration'  => '1',
	'social_facebook'      => '',
	'social_twitter'       => '',
	'social_googleplus'    => '',
	'social_pinterest'     => '',
	'social_vimeo'         => '',
	'social_linkedin'      => '',
	'social_flickr'        => '',
	'social_tumblr'        => '',
	'social_instagram'     => '',
	'social_github'        => '',
	'social_rss'           => '',
	'social_youtube'       => '',
	'customscripts_header' => '',
	'customscripts_footer' => '',
	'feed_url'             => '',
	'front_page_category'  => array(),
	'header_logo'          => '',
	'header_show'          => 'header-text',
	'button_text'          => '',
	'redirect_button_link' => '',
 );
global $blogify_theme_options_settings;
$blogify_theme_options_settings = blogify_theme_options_set_defaults( $blogify_theme_options_defaults );
function blogify_theme_options_set_defaults( $blogify_theme_options_defaults) {
	$blogify_theme_options_settings = array_merge( $blogify_theme_options_defaults, (array) get_option( 'blogify_theme_options', array() ) );
	return apply_filters( 'blogify_theme_options_settings', $blogify_theme_options_settings );
}