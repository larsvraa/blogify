<?php
/**
 * Displays the archive section of the theme.
 *
 */
?>

<?php get_header(); ?>

<?php
	/**
	 * blogify_before_main_container hook
	 */
	do_action( 'blogify_before_main_container' );
?>

<div id="container">
	<?php
		/**
		 * blogify_main_container hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * blogify_content 10
		 */
		do_action( 'blogify_main_container' );
	?>
</div><!-- #container -->

<?php
	/**
	 * blogify_after_main_container hook
	 */
	do_action( 'blogify_after_main_container' );
?>

<?php get_footer(); ?>