<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package MClub LA
 */
?>

	</div><!-- #main -->
	</div><!-- #wrapper -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<span class="footer-logo"><img src="<?php bloginfo('template_directory') ?>/images/bottom-logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>