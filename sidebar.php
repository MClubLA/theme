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

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <article class="right-container" role="secondary">
                    			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</article><!-- sidebar -->
	<?php endif; ?>