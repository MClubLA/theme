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
