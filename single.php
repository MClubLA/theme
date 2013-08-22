<?php
/**
 * The Template for displaying all single posts.
 *
 * @package MClub LA
 */

get_header(); ?>

	<div id="primary" class="content-area">
        <div class="breadcrumbs">
        <?php if(function_exists('bcn_display'))
       	{
			bcn_display();
		}?>
	    </div>
		<?php /* Display leader media (uses ACF) */
        if( get_field('mclub_leader_image') || get_field('mclub_leader_external') ) : 
			// image and/or external link attached to the post - which is selected?
			switch( get_field('mclub_leader_image_or_video') ) {
				case "Image":
					echo "IMAGE SELECTED";
					$mclub_leader_image = get_field('mclub_leader_image');
					//var_dump( $mclub_leader_image );
					break;
				case "Video":
					echo "VIDEO SELECTED";
					$mclub_leader_code = get_field('mclub_leader_external');
					break;
			}
        ?>
        <!-- break out of parent divs -->
        </div> <!-- .content-area -->
        </div> <!-- .site-main -->
        </div> <!-- .wrapper -->
        
        <div id="leader-media">
        	<div class="wrapper">
            	<span class="leader-media-span"><img src="<?php echo $mclub_leader_image["url"]; ?>" alt="<?php echo $mclub_leader_image["alt"]; ?>" /></span>
            </div> <!-- .wrapper -->
        </div> <!-- .leader-media -->
        
        <!-- restart divs to continue page display -->
        <div class="wrapper">
        <div class="site-main">
        <div class="content-area content-area-resume">
        <?php endif; // mclub_leader_image check ?>
		<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php mclub_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>