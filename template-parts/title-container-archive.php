<?php
/**
 * Template part for displaying the title of posts and pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package diego
 */
?>


<aside class="title-container">
    <div class="wrap">
        <?php
            the_archive_title( '<h1 class="archive-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
    </div>
</aside>