<?php
/*
 * Plugin Name: tw Shortcodes
 * Plugin URI: http://graphpaperpress.com/plugins/tw-shortcodes/
 * Description: tw Shortcodes is a free WordPress plugin that allows you to easily add “flat design” buttons, boxes, icons, pricing tables, tabs, toggles and column layouts in your posts and pages without modifying CSS, HTML or PHP.
 * Version: 1.1
 * Author: Graph Paper Press
 * Author URI: http://graphpaperpress.com
 * License: GPL2+
 */

/**
* Plugin constants
*/
 

/**
* Add the stylesheet
*/
function tw_shortcodes_stylesheet() {

    $tw_shortcodes_style = get_template_directory_uri() . '/library/tw-shortcodes/tw-shortcodes.css';
    $tw_shortcodes_file = get_template_directory() . '/library/tw-shortcodes/tw-shortcodes.css';
    $tw_sc_genericons =  get_template_directory_uri() . '/library/tw-shortcodes/genericons/genericons.css';

    if ( file_exists($tw_shortcodes_file) ) {
        wp_register_style( 'tw_shortcodes', $tw_shortcodes_style );
        wp_enqueue_style( 'tw_shortcodes');
		wp_enqueue_style( 'tw-sc-genericons', $tw_sc_genericons);
   }

	// Register scripts
	wp_register_script( 'tw_sc_scripts', plugin_dir_url( __FILE__ ) . 'js/tw_sc_scripts.js', array ( 'jquery', 'jquery-ui-accordion'), '1.0.3', true );
	wp_register_script( 'tw_sc_googlemap_api', 'https://maps.googleapis.com/maps/api/js?sensor=false', array( 'jquery' ), '1.0.3', true );

	// Enque scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-accordion' );
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_enqueue_script( 'tw_sc_scripts' );
	wp_enqueue_script( 'tw_sc_googlemap_api' );
}
add_action( 'wp_enqueue_scripts', 'tw_shortcodes_stylesheet' );


/**
* Don't auto-p wrap shortcodes that stand alone
*/
function tw_base_unautop() {
	add_filter( 'the_content', 'shortcode_unautop' );
}
add_action( 'init', 'tw_base_unautop' );


/**
* Add the shortcodes
*/
function tw_shortcodes() {

	add_filter( 'the_content', 'shortcode_unautop' );

	add_shortcode( 'one_third_first', 'tw_base_grid_4_first' );
	add_shortcode( 'one_third', 'tw_base_grid_4' );
	add_shortcode( 'one_third_last', 'tw_base_grid_4_last' );

	add_shortcode( 'two_thirds_first', 'tw_base_grid_8_first' );
	add_shortcode( 'two_thirds', 'tw_base_grid_8' );
	add_shortcode( 'two_thirds_last', 'tw_base_grid_8_last' );

	add_shortcode( 'one_half_first', 'tw_base_grid_6_first' );
	add_shortcode( 'one_half', 'tw_base_grid_6' );
	add_shortcode( 'one_half_last', 'tw_base_grid_6_last' );

	add_shortcode( 'one_fourth_first', 'tw_base_grid_3_first' );
	add_shortcode( 'one_fourth', 'tw_base_grid_3' );
	add_shortcode( 'one_fourth_last', 'tw_base_grid_3_last' );

	add_shortcode( 'three_fourths_first', 'tw_base_grid_9_first' );
	add_shortcode( 'three_fourths', 'tw_base_grid_9' );
	add_shortcode( 'three_fourths_last', 'tw_base_grid_9_last' );

	add_shortcode( 'one_sixth_first', 'tw_base_grid_2_first' );
	add_shortcode( 'one_sixth', 'tw_base_grid_2' );
	add_shortcode( 'one_sixth_last', 'tw_base_grid_2_last' );

	add_shortcode( 'five_sixth_first', 'tw_base_grid_10_first' );
	add_shortcode( 'five_sixth', 'tw_base_grid_10' );
	add_shortcode( 'five_sixth_last', 'tw_base_grid_10_last' );

	add_shortcode( 'tw_button', 'tw_button_shortcode');
	add_shortcode( 'tw_icon', 'tw_icon_shortcode' );
	add_shortcode( 'tw_box', 'tw_box_shortcode' );
	add_shortcode( 'tw_highlight', 'tw_highlight_shortcode' );
	add_shortcode( 'tw_divider', 'tw_divider_shortcode' );
	add_shortcode( 'tw_toggle', 'tw_toggle_shortcode' );
	add_shortcode( 'tw_googlemap', 'tw_shortcode_googlemaps' );
	add_shortcode( 'tw_accordion', 'tw_accordion_main_shortcode' );
	add_shortcode( 'tw_accordion_section', 'tw_accordion_section_shortcode' );
	add_shortcode( 'tw_pricing', 'tw_pricing_shortcode' );
	add_shortcode( 'tw_tabgroup', 'tw_tabgroup_shortcode' );
	add_shortcode( 'tw_tab', 'tw_tab_shortcode' );

	// Long posts should require a higher limit, see http://core.trac.wordpress.org/ticket/8553
	@ini_set( 'pcre.backtrack_limit', 500000 );
}
add_action( 'wp_head', 'tw_shortcodes' );


/**
 * Columns Shortcodes
 */

function tw_base_grid_4_first( $atts, $content = null ) {
   return '<div class="tw-sc-grid_4 alpha">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_4( $atts, $content = null ) {
   return '<div class="tw-sc-grid_4">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_4_last( $atts, $content = null ) {
   return '<div class="tw-sc-grid_4 omega">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function tw_base_grid_8_first( $atts, $content = null ) {
   return '<div class="tw-sc-grid_8 alpha">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_8( $atts, $content = null ) {
   return '<div class="tw-sc-grid_8">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_8_last( $atts, $content = null ) {
   return '<div class="tw-sc-grid_8 omega">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function tw_base_grid_6_first( $atts, $content = null ) {
   return '<div class="tw-sc-grid_6 alpha">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_6( $atts, $content = null ) {
   return '<div class="tw-sc-grid_6">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_6_last( $atts, $content = null ) {
   return '<div class="tw-sc-grid_6 omega">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function tw_base_grid_3_first( $atts, $content = null ) {
   return '<div class="tw-sc-grid_3 alpha">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_3( $atts, $content = null ) {
   return '<div class="tw-sc-grid_3">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_3_last( $atts, $content = null ) {
   return '<div class="tw-sc-grid_3 omega">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function tw_base_grid_9_first( $atts, $content = null ) {
   return '<div class="tw-sc-grid_9 alpha">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_9( $atts, $content = null ) {
   return '<div class="tw-sc-grid_9">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_9_last( $atts, $content = null ) {
   return '<div class="tw-sc-grid_9 omega">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function tw_base_grid_2_first( $atts, $content = null ) {
   return '<div class="tw-sc-grid_2 alpha">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_2( $atts, $content = null ) {
   return '<div class="tw-sc-grid_2">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_2_last( $atts, $content = null ) {
   return '<div class="tw-sc-grid_2 omega">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function tw_base_grid_10_first( $atts, $content = null ) {
   return '<div class="tw-sc-grid_10 alpha">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_10( $atts, $content = null ) {
   return '<div class="tw-sc-grid_10">' . do_shortcode($content) . '</div>';
}

function tw_base_grid_10_last( $atts, $content = null ) {
   return '<div class="tw-sc-grid_10 omega">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

/**
 * Buttons
 * @since 1.1
 *
 */

if ( !function_exists( 'tw_button_shortcode' ) ) {
	function tw_button_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' => 'blue',
			'url' => '#',
			'title' => '',
			'target' => 'self',
			'rel' => '',
			'class' => '',
			'icon_left' => '',
			'icon_right' => '',
			'size' => '',
			'display' => ''
		), $atts ) );

		$rel = ( $rel ) ? 'rel="' . $rel . '"' : NULL;

		$button = NULL;
		$button .= '<a href="' . $url . '" class="tw-sc-button ' . $color . ' ' . $class . ' ' . $size . ' ' . $display . '" target="_' . $target . '" title="' . $title . '" rel="' . $rel . '">';
			$button .= '<span class="tw-sc-button-inner">';
				if ( $icon_left ) $button .= '<span class="tw-sc-button-icon-left tw-sc-genericon tw-sc-genericon-'. $icon_left .'"></span>';
				$button .= $content;
				if ( $icon_right ) $button .= '<span class="tw-sc-button-icon-right tw-sc-genericon tw-sc-genericon-'. $icon_right .'"></span>';
			$button .= '</span>';
		$button .= '</a>';
		return $button;
	}
}

/**
 * Icons
 * @since 1.1
 *
 */

if ( !function_exists( 'tw_icon_shortcode' ) ) {
	function tw_icon_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			"type" => 'twitter',
			"size"   => '32px',
			"color"  => ''
	   ), $atts));

		return '<span class="tw-sc-genericon tw-sc-genericon-' . $type . '" style="color:' . $color . ';font-size:' . $size . ';"></span>';

	}
}

/**
 * Alert Boxes
 * @since 1.1
 *
 */

if ( !function_exists( 'tw_box_shortcode' ) ) {
	function tw_box_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' => 'black',
			'float' => 'left',
			'text_align' => 'center',
			'width' => '100%',
			'display' => '',
			'margin_top' => '',
			'margin_bottom' => '',
			'class' => '',
		  ), $atts ) );

			$style_attr = '';
			if ( $margin_bottom ) {
				$style_attr .= 'margin-bottom: '. $margin_bottom .';';
			}
			if ( $margin_top ) {
				$style_attr .= 'margin-top: '. $margin_top .';';
			}

		  $alert_content = '';
		  $alert_content .= '<div class="tw-sc-box ' . $color .  ' ' . $display . ' align' . $float . ' ' . $class . '" style="text-align:' . $text_align . '; width:' . $width . ';' . $style_attr . '">';
		  $alert_content .= ' '. do_shortcode($content) .'</div>';
		  return $alert_content;
	}
}

/**
 * Highlights
 * @since 1.1
 *
 */

if ( !function_exists( 'tw_highlight_shortcode' ) ) {
	function tw_highlight_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color'	=> 'yellow',
			'class'	=> '',
		  ),
		  $atts ) );
		  return '<span class="tw-sc-highlight ' . $color . ' ' . $class . '">' . do_shortcode( $content ) . '</span>';

	}
}

/**
 * Divider
 * @since 1.1
 *
 */

if ( !function_exists( 'tw_divider_shortcode' ) ) {
	function tw_divider_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'style' => 'solid',
			'color' => 'gray',
			'margin_top' => '20px',
			'margin_bottom' => '20px',
			'class' => '',
		),
		  $atts ) );
		$style_attr = '';
		if ( $margin_top && $margin_bottom ) {
			$style_attr = 'style="margin-top: ' . $margin_top . ';margin-bottom: ' . $margin_bottom . ';"';
		} elseif ( $margin_bottom ) {
			$style_attr = 'style="margin-bottom: ' . $margin_bottom . ';"';
		} elseif ( $margin_top ) {
			$style_attr = 'style="margin-top: ' . $margin_top . ';"';
		} else {
			$style_attr = NULL;
		}
	 return '<hr class="tw-sc-divider ' . $style . ' ' . $color . ' ' . $class . '" ' . $style_attr . ' />';
	}
}

/**
 * Toggle
 * @since 1.1
 *
 */

if ( !function_exists( 'tw_toggle_shortcode' ) ) {
	function tw_toggle_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title' => 'Toggle Title',
			'class' => '',
		), $atts ) );

		return '<div class="tw-sc-toggle ' . $class . '"><h3 class="tw-sc-toggle-trigger">' . $title . '</h3><div class="tw-sc-toggle-container">' . do_shortcode($content) . '</div></div>';
	}

}

/**
 * Accordion
 * @since 1.1
 *
 */

// Main
if ( !function_exists( 'tw_accordion_main_shortcode' ) ) {
	function tw_accordion_main_shortcode( $atts, $content = null  ) {

		extract( shortcode_atts( array(
			'class'	=> ''
		), $atts ) );

		// Display the accordion
		return '<div class="tw-sc-accordion ' . $class . '">' . do_shortcode($content) . '</div>';
	}
}

// Section
if ( !function_exists( 'tw_accordion_section_shortcode' ) ) {
	function tw_accordion_section_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'title'	=> 'Title',
			'class'	=> '',
		), $atts ) );

	   return '<h3 class="tw-sc-accordion-trigger ' . $class . '"><a href="#">' . $title . '</a></h3><div>' . do_shortcode($content) . '</div>';
	}

}

/**
 * Tabs
 * @since 1.1
 *
 */
if ( !function_exists( 'tw_tabgroup_shortcode' ) ) {
	function tw_tabgroup_shortcode( $atts, $content = null ) {

		// Display Tabs
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		$output = '';
		if( count($tab_titles) ){
		    $output .= '<div id="tw-sc-tab-'. rand(1, 100) .'" class="tw-sc-tabs">';
			$output .= '<ul class="ui-tabs-nav tw-sc-clearfix">';
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#tw-sc-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}
		return $output;
	}
}
if ( !function_exists( 'tw_tab_shortcode' ) ) {
	function tw_tab_shortcode( $atts, $content = null ) {
		$defaults = array(
			'title'	=> 'Tab Title',
			'class'	=> ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		return '<div id="tw-sc-tab-' . sanitize_title( $title ) . '" class="tab-content ' . $class . '">' . do_shortcode( $content ) .'</div>';
	}

}


/**
 * Google Maps
 * @since 1.1
 */

if ( ! function_exists( 'tw_shortcode_googlemaps' ) ) {
	function tw_shortcode_googlemaps( $atts, $content = null ) {

		extract(shortcode_atts(array(
				'title'		=> '',
				'location'	=> '',
				'width'		=> '',
				'height'	=> '300',
				'zoom'		=> 8,
				'align'		=> '',
				'class'		=> '',
		), $atts));


		$output = '<div id="map_canvas_' . rand(1, 100) . '" class="googlemap ' . $class . '" style="height:' . $height . 'px;width:100%">';
			$output .= ( !empty($title) ) ? '<input class="title" type="hidden" value="'.$title.'" />' : '';
			$output .= '<input class="location" type="hidden" value="' . $location . '" />';
			$output .= '<input class="zoom" type="hidden" value="' . $zoom . '" />';
			$output .= '<div class="map_canvas"></div>';
		$output .= '</div>';

		return $output;

	}
}

/**
 * Pricing Table
 * @since 1.1
 *
 */

if ( !function_exists( 'tw_pricing_shortcode' ) ) {
	function tw_pricing_shortcode( $atts, $content = null  ) {

		extract( shortcode_atts( array(
			'color' => 'black',
			'position' => '',
			'featured' => 'no',
			'plan' => 'Basic',
			'cost' => '$20',
			'per' => 'month',
			'button_url' => '',
			'button_text' => 'Sign up',
			'button_color' => 'green',
			'button_target' => 'self',
			'button_rel' => 'nofollow',
			'class' => '',
		), $atts ) );

		//set variables
		$featured_pricing = ( $featured == 'yes' ) ? 'featured' : NULL;

		//start content
		$pricing_content ='';
		$pricing_content .= '<div class="tw-sc-pricing-table ' . $class . '">';
		$pricing_content .= '<div class="tw-sc-pricing ' . $featured_pricing . ' tw-sc-column-' . $position . ' ' . $class . '">';
			$pricing_content .= '<div class="tw-sc-pricing-header '. $color .'">';
				$pricing_content .= '<h5>' . $plan . '</h5>';
				$pricing_content .= '<div class="tw-sc-pricing-cost">' . $cost . '</div><div class="tw-sc-pricing-per">' . $per . '</div>';
			$pricing_content .= '</div>';
			$pricing_content .= '<div class="tw-sc-pricing-content">';
				$pricing_content .= '' . $content . '';
			$pricing_content .= '</div>';
			if( $button_url ) {
				$pricing_content .= '<div class="tw-sc-pricing-button"><a href="' . $button_url . '" class="tw-sc-button ' . $button_color . '" target="_' . $button_target . '" rel="' . $button_rel . '"><span class="tw-sc-button-inner">' . $button_text . '</span></a></div>';
			}
		$pricing_content .= '</div>';
		$pricing_content .= '</div><div class="tw-sc-clear-floats"></div>';
		return $pricing_content;
	}

}
?>