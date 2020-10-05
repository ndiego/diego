<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package diego
 */

get_header();
?>
	<div class="site-inner">

		<aside class="title-container">
		    <div class="wrap">
		        <?php
		            the_archive_title( '<h1 class="archive-title">', '</h1>' );
		            the_archive_description( '<div class="archive-description">', '</div>' );
		        ?>
		    </div>
		</aside>

		<div class="content-sidebar-wrap">
			<main id="primary" class="site-main">
				<?php if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						
						/**						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content-archive' );
						
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'diego' ),
								'after'  => '</div>',
							)
						);

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
