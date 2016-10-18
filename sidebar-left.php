<?php
/**
 * Displays the left sidebar of the theme.
 *
 */
?>

<?php
	/**
	 * blogify_before_left_sidebar
	 */
	do_action( 'blogify_before_left_sidebar' );
?>

<?php
	/**
	 * blogify_left_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * blogify_display_left_sidebar 10
	 */
	do_action( 'blogify_left_sidebar' );
?>

<?php
	/**
	 * blogify_after_left_sidebar
	 */
	do_action( 'blogify_after_left_sidebar' );
?>