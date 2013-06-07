<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>                  
                        <article class="left-container">
                            <div class="fig-area">
                                <figure class="drive">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/m-car3.jpg" alt="img"/>
                                </figure>
                                <div class="tags">
                                     <h3 class="tags-head">TAGS:</h3>
                                    <ul>
                                        <li><a class="btn" href="#">Feature</a></li>
                                        <li><a class="btn gary-btn" href="#">Scott Chu</a></li>
                                        <li><a class="btn gary-btn" href="#">e21</a></li>
                                    </ul>
                                </div>
                            </div>
							<article class="content">
			<?php if ( is_single() ) : ?>
			<h3 class="heading"><?php the_title(); ?></h1>
			<?php else : ?>
			<h3 class="heading">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
			<?php endif; // is_single() ?>
                                            <h4 class="sub-heading solid-border">subtitle placeholder</h4>
                                <span class="date"><?php get_the_date() ?></span>
		
			<?php the_content( "More" ); ?>
		<!-- .entry-content -->
                            </article>
                        </article>
                    </div>
<!-- end main post content area -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
