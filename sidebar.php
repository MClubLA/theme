<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<article class="right-container">
<?php if (function_exists('wpp_get_mostpopular')) : ?>
<h2 class="post">Popular Posts</h2>

	<?php wpp_get_mostpopular(); ?>
<?php endif; ?>
</article>