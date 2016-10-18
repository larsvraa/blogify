<?php
/**
 * Displays the footer section of the theme.
 *
 */
?>
	   </div><!-- #main -->

	   <?php
	      /**
	       * blogify_after_main hook
	       */
	      do_action( 'blogify_after_main' );
	   ?>

	   <?php
	   	/**
	   	 * blogify_before_footer hook
	   	 */
	   	do_action( 'blogify_before_footer' );
	   ?>

	   <footer id="footerarea" class="clearfix">
			<?php
		      /**
		       * blogify_footer hook
				 *
				 * HOOKED_FUNCTION_NAME PRIORITY
				 *
				 * blogify_footer_widget_area 10
				 * blogify_open_sitegenerator_div 20
				 * blogify_socialnetworks 25
				 * blogify_footer_info 30
				 * blogify_close_sitegenerator_div 35
				 * blogify_backtotop_html 40
		       */
		      do_action( 'blogify_footer' );
		   ?>
		</footer>

		<?php
	   	/**
	   	 * blogify_after_footer hook
	   	 */
	   	do_action( 'blogify_after_footer' );
	   ?>

	</div><!-- .wrapper -->

	<?php
		/**
		 * blogify_after hook
		 */
		do_action( 'blogify_after' );
	?>

<?php wp_footer(); ?>

</body>
</html>