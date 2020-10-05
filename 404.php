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

		<div class="content-sidebar-wrap">
			<main id="primary" class="site-main">
				<section class="error-404 not-found">
					<header class="page-header">
						<span class="error-code">404</span>
						<h1 class="page-title"><?php esc_html_e( 'Oh no… I can\'t find that page.', 'diego' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'Try returning to the homepage or use the search field below.', 'diego' ); ?></p>
						<?php
							get_search_form();
						?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</main><!-- #main -->
		</div><!-- .content-sidebar-wrap -->
	</div><!-- .site-inner -->

<?php
get_footer();
