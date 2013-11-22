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
		<div class="footer-wrapper">
			<div id="footer-banner"><img src="<?php echo get_template_directory_uri(); ?>/images/footer-banner.png" alt="MClub LA - Motorsports is Life" /></div>
			<div id="footer-col-1" class="footer-column">
				<?php if ( ! dynamic_sidebar( 'footer-col-1' ) ) : ?>
				<ul>
					<li class="footer-col-header">Help</li>
					<li><a href="#">Shop Policies</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">My Account</a></li>
				</ul>
				<?php endif; ?>
			</div>
			<div id="footer-col-2" class="footer-column">
				<?php if ( ! dynamic_sidebar( 'footer-col-2' ) ) : ?>
				<ul>
					<li class="footer-col-header">Company</li>
					<li><a href="#">About</a></li>
				</ul>
				<?php endif; ?>
			</div>
			<div id="footer-col-3" class="footer-column">
				<?php if ( ! dynamic_sidebar( 'footer-col-3' ) ) : ?>
				<ul>
					<li class="footer-col-header">Site Tools</li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Tech</a></li>
					<li><a href="#">Forum</a></li>
				</ul>
				<?php endif; ?>
			</div>
			<div id="footer-col-email"></div>
			<div id="footer-col-social-buttons"></div>
		</div><!-- .footer-wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>