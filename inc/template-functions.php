<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package diego
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function diego_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'diego_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function diego_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'diego_pingback_header' );




/**
 * Print a lsit of all tags
 */
function diego_print_all_tags() {
	$tags = get_tags();
	
	foreach ( $tags as $tag ) {
		$tag_link = get_tag_link( $tag->term_id );
		
		echo '<a href="' . $tag_link . '" title="' . $tag->name . '">' . $tag->name . '</a>';
	}
}

/**
 * Display the "Filter by Tags" component 
 */
function diego_fitler_tags_component() {
	?>
	<aside class="filter-by-tags"> 
		<label><?php _e( 'Sort by topics:', 'diego' );?></label>
		<div class="tags-links">
			<?php diego_print_all_tags(); ?>
		</div>
	</aside>
	<?php
}
