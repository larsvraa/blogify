<?php
/**
 * Displays the footer sidebar of the theme.
 *
 */
?>

<?php
	/**
	 * blogify_before_footer_widget
	 */
	do_action( 'blogify_before_footer_widget' );
?>

<?php
	/**
	 * blogify_footer_widget hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * blogify_display_footer_widget 10
	 */
	do_action( 'blogify_footer_widget' );
?>

<?php
	/**
	 * blogify_after_footer_widget
	 */
	do_action( 'blogify_after_footer_widget' );
?>