<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<?php if ( is_home() && ! is_paged() ) : ?>
				<!-- feature slider -->
                <div class="top-container">
                    <figure class="left-bar">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/m-car1.jpg" alt="MCLUB-E36"/>
                    </figure>
                    <article class="right-bar">
                        <h3 class="heading">SCOTT CHU x MCLUB</h3>
                        <h4 class="sub-heading">E36 Photoshoot</h4>
                        <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at pretium nisl.
                            Donec feugiat est interdum sem fringilla tempor. Proin quis dui risus. 
                            Phasellus enim turpis, ultrices id molestie id, vestibulum quis ligula. 
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Pellentesque bibendum libero non orci elementum varius. Quisque et volutpat ipsum. Aenean nec purus velit, a tempus arcu. 
                            Phasellus sed metus purus, cursus pulvinar enim. Sed eu lorem libero.
                        </p>
                        <p class="para">
                            In ut velit erat. Nunc ac faucibus est. Curabitur in elit nisl, id gravida nisi. Vivamus pharetra ipsum sit amet erat laoreet vehicula.
                            Nam eget mi lectus, id feugiat nisi. Pellentesque semper, magna sit amet porta porta, mi libero gravida ligula, 
                            sed placerat eros ante commodo mauris. Phasellus in orci sem, ut porta justo. Aliquam non tincidunt velit. Vivamus non nibh hendrerit augue aliquam ornare id ac purus.
                        </p>
                        <span class="date">11 October, 2012</span>
                    </article>
                </div>
				<!-- end feature slider -->
<?php endif; ?>
				<!-- begin main post content area -->
                <div class="main-container">
                    <div class="feature-left">
                    
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

                    </div>
<!-- end main post content area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>