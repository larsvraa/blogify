<?php
/**
 * This file displays page with left sidebar.
 *
 */
?>

<?php
   /**
    * blogify_before_primary
    */
   do_action( 'blogify_before_primary' );
?>

<div id="primary">
   <?php
      /**
       * blogify_before_loop_content
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * blogify_loop_before 10
       */
      do_action( 'blogify_before_loop_content' );

      /**
       * blogify_loop_content
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * blogify_theloop 10
       */
      do_action( 'blogify_loop_content' );

      /**
       * blogify_after_loop_content
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * blogify_next_previous 5
		 * blogify_loop_after 10
       */
      do_action( 'blogify_after_loop_content' );
   ?>
</div><!-- #primary -->

<?php
   /**
    * blogify_after_primary
    */
   do_action( 'blogify_after_primary' );
?>

<div id="secondary" class="no-margin-left">
	<?php get_sidebar( 'left' ); ?>
</div><!-- #secondary -->