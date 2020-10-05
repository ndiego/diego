<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package diego
 */

get_header();
?>
	<div class="site-inner">

		<aside class="title-container">
			<div class="wrap">
				<h1 class="archive-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'diego' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</div>
		</aside>

		<div class="content-sidebar-wrap">
			<main id="primary" class="site-main">

				<?php if ( have_posts() ) : 
					
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_pagination( array(
						'mid_size'  => 2,
						'prev_text' => '&laquo; ' . __( 'Previous Page', 'textdomain' ),
						'next_text' => __( 'Next Page', 'textdomain' ) . ' &raquo;',
					) );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</main><!-- #main -->
			<?php
				get_sidebar();
			?>
		</div><!-- .content-sidebar-wrap -->
	</div><!-- .site-inner -->
<?php
get_footer();
