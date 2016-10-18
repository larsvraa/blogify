<?php
/**
 * This file displays page with right sidebar.
 *
 */
?>

<?php
   /**
    * blogify_before_primary
    */
   do_action( 'blogify_before_primary' );
?>

<?php
   /**
    * blogify_after_primary
    */
   do_action( 'blogify_after_primary' );
?>

<div id="secondary">
	<?php get_sidebar( 'right' ); ?>
</div><!-- #secondary -->