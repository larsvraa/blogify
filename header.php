<?php
/**
 * Displays the header section of the theme.
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<?php
		/**
		 * blogify_meta hook
		 */
		do_action( 'blogify_meta' );

		/**
		 * blogify_links hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * blogify_add_links 10
		 * blogify_favicon 15
		 * blogify_webpageicon 20
		 *
		 */
		do_action( 'blogify_links' );

		/**
		 * This hook is important for WordPress plugins and other many things
		 */
		wp_head();
	?>

</head>

<body <?php body_class(); ?>>
	<?php
		/**
		 * blogify_before hook
		 */
		do_action( 'blogify_before' );
	?>

	<div class="wrapper">
		<?php
			/**
			 * blogify_before_header hook
			 */
			do_action( 'blogify_before_header' );
		?>
		<header id="branding" >
			<?php
				/**
				 * blogify_header hook
				 *
				 * HOOKED_FUNCTION_NAME PRIORITY
				 *
				 * blogify_headerdetails 10
				 */
				do_action( 'blogify_header' );
			?>
		</header>
		<?php
			/**
			 * blogify_after_header hook
			 */
			do_action( 'blogify_after_header' );
		?>

		<?php
			/**
			 * blogify_before_main hook
			 */
			do_action( 'blogify_before_main' );
		?>
		<div id="main" class="container clearfix">