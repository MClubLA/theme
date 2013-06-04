<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>

                    
                    
                        <article id="post-<?php the_ID(); ?>" class="left-container">
                            <div class="fig-area">
                                <figure class="drive">
                                    <img src="include/images/m-car2.jpg" alt="img"/>
                                </figure>
                                <div class="tags">
                                    <h3 class="tags-head">TAGS:</h3>
                                    <ul>
                                        <li><a class="btn" href="#">Events</a></li>
                                        <li><a class="btn gary-btn" href="#">1ST Tuesdays</a></li>
                                        <li><a class="btn gary-btn" href="#">Meet-Ups</a></li>
                                    </ul>
                                </div>
                            </div>
                            <article class="content">
                                <h3 class="heading">MCLUB LA: </h3>
                                <h4 class="sub-heading solid-border">Drive & Cool</h4>
                                <span class="date">11 October, 2012</span>
                                <p class="para">Morbi lacinia commodo dui, sed hendrerit arcu blandit non. Etiam sit amet diam est, ac ultrices magna. 
                                    Pellentesque suscipit congue nunc, in congue dui sollicitudin vitae. Nunc ut quam ipsum. Donec porttitor, lorem et rutrum commodo, 
                                    mi erat varius tellus, ultrices egestas sapien urna vitae lacus. Donec nec diam nibh, a iaculis justo. Ut enim diam, 
                                    venenatis id commodo in, ultricies ut diam. Donec porttitor varius nibh quis laoreet. Nunc hendrerit cursus neque,
                                    eget mollis ante dignissim eget. Donec cursus, ligula ac porttitor ornare, enim tortor aliquam nisi, vel rhoncus risus magna vel leo.
                                    Vestibulum augue leo, commodo volutpat laoreet sed, posuere nec sapien. Fusce iaculis, diam et lacinia sodales, augue elit commodo erat,
                                    quis volutpat nulla felis ut tortor. Donec adipiscing justo at massa ultricies feugiat. Ut viverra nibh eget dui rutrum ac feugiat risus vehicula.
                                    Phasellus gravida mauris at metus lacinia pellentesque...(<a class="more" href="#">More</a>)
                                </p>
                            </article>
                        </article>
                    </div>
<!-- end main post content area -->




	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</header><!-- .entry-header -->

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
