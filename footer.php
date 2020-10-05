<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package diego
 */

?>

	<footer id="colophon" class="site-footer" itemtype="http://schema.org/WPFooter">
		<div class="wrap">
			<?php
				if ( is_active_sidebar( 'footer' ) ) : 
					 dynamic_sidebar( 'footer' );
				endif;
				 
				if ( ! is_active_sidebar( 'footer' ) ) :
					 ?>
						 <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'diego' ) ); ?>">
							 <?php
							 /* translators: %s: CMS name, i.e. WordPress. */
							 printf( esc_html__( 'Proudly powered by %s', 'diego' ), 'WordPress' );
							 ?>
						 </a>
						 <span class="sep"> | </span>
							 <?php
							 /* translators: 1: Theme name, 2: Theme author. */
							 printf( esc_html__( 'Theme: %1$s by %2$s.', 'diego' ), 'Diego', '<a href="https://www.nickdiego.com/">Nick Diego</a>' );
							 ?>
					 <?php
				 endif;
			 ?>
		</div><!-- .wrap -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
