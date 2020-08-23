<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
					while ( have_posts() ) : 
						the_post();
						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile;
				?>
			</main><!-- #main -->
			<?php
				get_sidebar();
			?>
		</div><!-- .content-sidebar-wrap -->
	</div><!-- .site-inner -->
<?php
get_footer();