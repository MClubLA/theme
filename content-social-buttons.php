<?php
/**
 * The template for displaying the content social buttons
 *
 * Intended to be displayed below the content
 *
 * @package MClub LA
 */
?>

<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-type="icon"></div>
<div class="tw-share-button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo wp_get_shortlink(); ?>" data-text="<?php the_title(); ?>" data-count="none" data-hashtags="MClubLA"></a>