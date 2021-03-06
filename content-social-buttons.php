<?php
/**
 * The template for displaying the content social buttons
 *
 * Intended to be displayed below the content
 *
 * @package MClub LA
 */
?>

<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-type="button" style="vertical-align: top; padding-top:4px;"></div>
<div class="tw-share-button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo wp_get_shortlink(); ?>" data-text="<?php the_title(); ?>" data-count="none" data-hashtags="MClubLA"></a></div>
<div class="rd-share-button"><a href="http://www.reddit.com/submit?url=<?php urlencode( the_permalink() ); ?>&title=<?php urlencode( the_title() ) ?>" target="_blank"><img src="http://www.reddit.com/static/spreddit5.gif" alt="submit to reddit" border="0" /></a></div>
<div class="g-plusone" data-href="<?php the_permalink(); ?>" data-annotation="none" data-size="small"></div>
<div class="fnc-share-button"><a id="FancyButton" href="http://fancy.com/fancyit?Category=cars-and-vehicles&Title=<?php urlencode( the_permalink() ); ?>&ItemURL=<?php urlencode( the_title() ) ?>" target="_blank"><img src="http://fancy.com/_ui/images/business/logo-type3.png" width="24px" height="24px"/></a></div>
<div class="su-share-button"><su:badge layout="4"></su:badge></div>
