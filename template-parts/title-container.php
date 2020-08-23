<?php
/**
 * Template part for displaying the title of posts and pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package diego
 */
?>


<aside class="title-container<?php echo has_post_thumbnail() ? ' has-thumbnail' :''; ?>">
    <div class="wrap">
        <?php
        if ( is_home() ) :
            ?>
            <div>
                <h1 class="archive-title"><?php single_post_title(); ?></h1>
            </div>
            <?php
        else :
            
            if ( 'post' === get_post_type() ) :
                ?>
                <div class="entry-meta">
                    <?php
                        diego_posted_on();
                    
                        get_template_part( 'template-parts/social-share' );
                    ?>
                </div><!-- .entry-meta -->
                <?php
            endif; 
            
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;
        
        endif;
        ?>
    </div>
</aside>