<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package diego
 */

get_header();
?>
	<div class="site-inner">
	
		<?php
			if ( ! is_front_page() ) :
				get_template_part( 'template-parts/title-container' );
			endif;	
		?>

		<div class="content-sidebar-wrap">
			<main id="primary" class="site-main">
				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						
						if ( is_home() ) :
							get_template_part( 'template-parts/content-archive' );
						else : 
							get_template_part( 'template-parts/content', get_post_type() );
						endif;

					endwhile;
					
					if ( is_home() ) :
						the_posts_pagination( array(
							'mid_size'  => 2,
							'prev_text' => '&laquo; ' . __( 'Previous Page', 'textdomain' ),
							'next_text' => __( 'Next Page', 'textdomain' ) . ' &raquo;',
						) );
					else : 
						the_posts_navigation();
					endif;

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
