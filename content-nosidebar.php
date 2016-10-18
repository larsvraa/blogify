<?php
/**
 * This file displays page with no sidebar.
 *
 */
?>


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