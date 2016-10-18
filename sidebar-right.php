<?php
/**
 * Displays the right sidebar of the theme.
 *
 */
?>

<?php
	/**
	 * blogify_before_right_sidebar
	 */
	do_action( 'blogify_before_right_sidebar' );
?>

<?php
	/**
	 * blogify_right_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * blogify_display_right_sidebar 10
	 */
	do_action( 'blogify_right_sidebar' );
?>

<?php
	/**
	 * blogify_after_right_sidebar
	 */
	do_action( 'blogify_after_right_sidebar' );
?>