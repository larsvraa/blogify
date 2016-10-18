<?php
/**
 * blogify Show Post Type 'Post' IDs
 *
 * This file shows the Post Type 'Post' IDs in the all post table.
 * This file shows the post id and hence helps the users to see the respective post ids so that they can use in the slider options easily.
 *
 */

/****************************************************************************************/

add_action( 'admin_init', 'blogify_show_post_respective_id' );
/**
 * Hooking blogify_show_post_respective_id function to admin_init action hook.
 * The purpose is to show the respective post id in all posts table.
 */
function blogify_show_post_respective_id() {
	/**
	 * CSS for the added column.
	 */
	add_action( 'admin_head', 'blogify_post_table_column_css' );

	/**
	 * For the All Posts table
	 */
	add_filter( 'manage_posts_columns', 'blogify_column' );
	add_action( 'manage_posts_custom_column', 'blogify_value', 10, 2 );

	/**
	 * For the All Pages table
	 */
	add_filter('manage_pages_columns', 'blogify_column');
	add_action('manage_pages_custom_column', 'blogify_value', 10, 2);
}

/**
 * Add a new column for all posts table.
 * The column is named ID.
 */
function blogify_column( $cols ) {
	$cols[ 'blogify-column-id' ] = 'ID';
	return $cols;
}

/**
 * This function shows the ID of the respective post.
 */
function blogify_value( $column_name, $id ) {
	if ( 'blogify-column-id' == $column_name )
		echo $id;
}

/**
 * CSS for the newly added column in all posts table.
 * The width of new column is set to 40px.
 */
function blogify_post_table_column_css() {
?>
	<style type="text/css">
		#blogify-column-id {
			width: 40px;
		}
	</style>
<?php
}
?>