<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'diego' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'diego' ); ?></p>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</main><!-- #main -->
			<?php
				get_sidebar();
			?>
		</div><!-- .content-sidebar-wrap -->
	</div><!-- .site-inner -->

<?php
get_footer();
