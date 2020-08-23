<?php
/**
 * Template part for displaying social share links on posts/pages
 *
 * @package diego
 */
?>

<?php 
    $page_url   = get_permalink();
    $page_title = rawurlencode( get_the_title() );
    
    $facebook   = 'https://facebook.com/sharer/sharer.php?u=' . $page_url;
    $twitter    = 'https://twitter.com/intent/tweet/?text=' . $page_title . '&amp;url=' . $page_url;
    $linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $page_url;
    $email      = 'mailto:?subject=' . $page_title . '&amp;body=' . $page_url;
?>

<div class="social-share">
    <div class="social-share-title">
        <span>Share:</span>
    </div>
    
    <a class="social-share-twitter" href="<?php echo $twitter; ?>" target="_blank" rel="noopener" aria-label="Share on Twitter" title="Share on Twitter">
        <i class="fab fa-twitter" aria-hidden="true"></i>
    </a>
    
    <a class="social-share-facebook" href="<?php echo $facebook; ?>" target="_blank" rel="noopener" aria-label="Share on Facebook" title="Share on Facebook">
        <i class="fab fa-facebook" aria-hidden="true"></i>
    </a>
    
    <a class="social-share-linkedin" href="<?php echo $linkedin; ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn" title="Share on LinkedIn">
        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
    </a>

    <a class="social-share-email" href="<?php echo $email; ?>" target="_self" rel="noopener" aria-label="Share by E-Mail" title="Share by E-Mail">
        <i class="fas fa-envelope" aria-hidden="true"></i>
    </a>
</div>