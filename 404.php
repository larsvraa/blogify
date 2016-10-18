<?php
/**
 * Displays the 404 error page of the theme.
 */
?>

<?php get_header(); ?>

<div id="content">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Error 404 - Page NOT Found', 'blogify' ); ?></a></h1>
		</header>
		<div class="entry-content clearfix" >
			<p><?php _e( 'It seems we can\'t find what you\'re looking for.', 'blogify' ); ?></p>
			<h3><?php _e( 'This might be because:', 'blogify' ); ?></h3>
			<ul>
				<li><?php _e( 'You have typed the web address incorrectly', 'blogify' ); ?></li>
				<li><?php _e( 'The page you were looking for may have been moved, updated or deleted.', 'blogify' ); ?></li>
			</ul>
			<h3><?php _e( 'Please try the following:', 'blogify' ); ?></h3>
			<ul>
				<li><?php _e( 'Check for a mis-typed URL error', 'blogify' ); ?></li>
				<li><?php _e( 'Press the refresh button on your browser.', 'blogify' ); ?></li>
				<li><?php _e( 'Go back to', 'blogify' ); ?> <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php _e( 'Homepage', 'blogify' ); ?></a></li>
			</ul>
		</div><!-- .entry-content -->
	</div><!-- #content -->

<?php get_footer(); ?>